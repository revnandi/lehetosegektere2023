interface TileMapItem {
  tileNumber?: number;
  position: number;
  top: number;
  left: number;
  rotation: number;
}

interface TileMap {
  [key: number]: TileMapItem;
  empty: TileMapItem;
}

interface HTMLDivElementWithDataset extends HTMLDivElement {
  dataset: DOMStringMap & {
    itemNumber: number;
  };
}

export class Puzzle {
  private wrapperId: string;
  private wrapper: HTMLElement;
  private innerId: string;
  private inner: HTMLElement;
  private notificationId: string;
  private notification: HTMLElement;
  private baseDistance: number;
  private tileMap: TileMap;

  constructor(options: { wrapperId: string, innerId: string, notificationId: string }) {
    this.wrapperId = options.wrapperId;
    this.wrapper = document.getElementById(this.wrapperId)!;
    this.innerId = options.innerId;
    this.inner = document.getElementById(this.innerId)!;
    this.notificationId = options.notificationId;
    this.notification = document.getElementById(this.notificationId)!;
    this.baseDistance = 100;
    this.tileMap = {
      1: {
        tileNumber: 1,
        position: 1,
        top: 0,
        left: 0,
        rotation: 0
      },
      2: {
        tileNumber: 2,
        position: 2,
        top: 0,
        left: this.baseDistance * 1,
        rotation: 0
      },
      3: {
        tileNumber: 3,
        position: 4,
        top: this.baseDistance,
        left: 0,
        rotation: 0
      },
      4: {
        tileNumber: 4,
        position: 5,
        top: this.baseDistance,
        left: this.baseDistance,
        rotation: 0
      },
      5: {
        tileNumber: 5,
        position: 6,
        top: this.baseDistance,
        left: this.baseDistance * 2  ,
        rotation: 0
      },
      6: {
        tileNumber: 6,
        position: 7,
        top: this.baseDistance * 2,
        left: 0,
        rotation: 0
      },
      7: {
        tileNumber: 7,
        position: 8,
        top: this.baseDistance * 2,
        left: this.baseDistance,
        rotation: 0
      },
      8: {
        tileNumber: 8,
        position: 9,
        top: this.baseDistance * 2,
        left: this.baseDistance * 2,
        rotation: 0
      },
      empty: {
        position: 3,
        top: 0,
        left: this.baseDistance * 2,
        rotation: 0
      }
    }
  }

  init(): void {
    if(!this.wrapper) return;
    this.attachEventListeners();

    let delay = -50;
    
    const tiles = this.wrapper.querySelectorAll(':scope > div:first-child > div');
    for(let i = 0; i < tiles.length; i++) {
      setTimeout((tile: HTMLDivElementWithDataset) => {
        this.setTile(tile);
      }, delay, tiles[i]);
    }
    
    setTimeout(() => {
      this.wrapper.classList.add('opacity-100');
      this.notification.classList.add('show-puzzle-notification')
    }, 800);

    setTimeout(() => {
    }, 1000);
  }

  private setTile(tile: HTMLDivElementWithDataset):void {
    const tileId = tile.dataset.itemNumber;
    const xMovement = this.tileMap[tileId].left;
    const yMovement = this.tileMap[tileId].top;
    const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(0deg)`;
    tile.style.transform = translateString;
  }

  private attachEventListeners(): void {
    const puzzleItems = Array.from(document.querySelectorAll(`#${this.wrapperId} > div:first-child > div`)) as HTMLElement[];

    this.inner.addEventListener('mouseenter', () => {
      this.notification.classList.remove('show-puzzle-notification')
    })

    this.inner.addEventListener('mouseleave', () => {
      this.notification.classList.add('show-puzzle-notification')
    })

    puzzleItems.forEach((item) => {
      item.addEventListener('click', (event) => {
        this.handleClick(event)
      });
      item.addEventListener('mouseover', (event) => {
        this.handleMouseOver(event);
      });
      item.addEventListener('mouseleave', (event) => {
        this.handleMouseLeave(event);
      });
    });
  }

  private moveTile(tile: HTMLDivElementWithDataset) {
    const tileNumber = tile.dataset.itemNumber;
    if (!this.isTileMovable(Number(tileNumber))) {
      const regex = 'rotateZ\\((.*)deg';
      const rotationMatch = tile.style.transform.match(regex);
      let rotation = rotationMatch ? rotationMatch[1] : "";

      rotation = (parseInt(rotation) + 90).toString();
      const xMovement = this.tileMap[tileNumber].left;
      const yMovement = this.tileMap[tileNumber].top;
      const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg)`;
      tile.style.webkitTransform = translateString;
      this.tileMap[tileNumber].rotation = parseInt(rotation);
      return;
    }
    const emptyTop = this.tileMap.empty.top;
    const emptyLeft = this.tileMap.empty.left;
    const emptyPosition = this.tileMap.empty.position;
    this.tileMap.empty.top = this.tileMap[tileNumber].top;
    this.tileMap.empty.left = this.tileMap[tileNumber].left;
    this.tileMap.empty.position = this.tileMap[tileNumber].position;

    let rotation = this.tileMap[tileNumber].rotation;

    const xMovement = emptyLeft;
    const yMovement = emptyTop;
    const translateString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg)`;
    tile.style.webkitTransform = translateString;

    this.tileMap[tileNumber].top = emptyTop;
    this.tileMap[tileNumber].left = emptyLeft;
    this.tileMap[tileNumber].position = emptyPosition;
  }

  private handleClick(event: MouseEvent) {
    const targetTile = event.currentTarget as HTMLDivElementWithDataset;
    this.moveTile(targetTile);
  }

  private isTileMovable(tileNumber: number) {
    const selectedTile = this.tileMap[tileNumber];
    const emptyTile = this.tileMap.empty;
    const movableTiles = this.movementMap(emptyTile.position);
    if (movableTiles.includes(selectedTile.position)) {
      return true;
    } else {
      return false;
    };
  }

  private movementMap(position: number): number[] {
    switch (position) {
      case 9:
        return [6, 8];
      case 8:
        return [5, 7, 9];
      case 7:
        return [4, 8];
      case 6:
        return [3, 5, 9];
      case 5:
        return [2, 4, 6, 8];
      case 4:
        return [1, 5, 7];
      case 3:
        return [2, 6];
      case 2:
        return [1, 3, 5];
      case 1:
        return [2, 4];
      default:
        return [];
    }
  }

  private handleMouseOver(event: MouseEvent): void {
    const targetElement = event.currentTarget as HTMLDivElementWithDataset;
    const tileNumber = targetElement.dataset.itemNumber;
    const regex = 'rotateZ\\((.*)deg';
    const rotationMatch = targetElement.style.transform.match(regex);
    let rotation = rotationMatch ? rotationMatch[1] : "";
    const yMovement = this.tileMap[tileNumber].top;
    const xMovement = this.tileMap[tileNumber].left;
    const newTransformString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg) scale(0.90)`;
    targetElement.style.zIndex = '1';
    targetElement.style.transform = newTransformString;
  }

  private handleMouseLeave(event: MouseEvent): void {
    const targetElement = event.currentTarget as HTMLDivElementWithDataset;
    const tileNumber = targetElement.dataset.itemNumber;
    const regex = 'rotateZ\\((.*)deg';
    const rotationMatch = targetElement.style.transform.match(regex);
    let rotation = rotationMatch ? rotationMatch[1] : "";
    const yMovement = this.tileMap[tileNumber].top;
    const xMovement = this.tileMap[tileNumber].left;
    const newTransformString = `translateX(${xMovement}%) translateY(${yMovement}%) rotateZ(${rotation}deg) scale(1)`;
    targetElement.style.zIndex = '0';
    targetElement.style.transform = newTransformString;
  }
}