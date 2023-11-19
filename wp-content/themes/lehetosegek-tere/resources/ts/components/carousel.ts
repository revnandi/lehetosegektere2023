import Splide, { Options } from '@splidejs/splide';

import '@splidejs/splide/css/core';

export class Carousel {
  private carousel: Splide | null = null;

  constructor(private wrapperId: string, private options: Options = {}) {}

  
  init(): void {
    const element = document.getElementById(this.wrapperId) as HTMLDivElement;
    if(!element) return;

    this.carousel = new Splide( element, this.options ).mount();
  }

  next(): void {
    // this.glider?.scrollItem(1, true);
  }

  prev(): void {
    // this.glider?.scrollItem(-1, true);
  }

  destroy(): void {
    // if (this.glider) {
    //   this.glider.destroy();
    //   this.glider = null;
    // }
  }
}
