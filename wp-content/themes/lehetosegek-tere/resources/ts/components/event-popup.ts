// @ts-nocheck

import { formatDatetimeToShortMonthAndDay, formatDatetimeToTimeRange } from './../utils';

interface FeaturedImageDetails {
  url: string;
  width: number;
  height: number;
}

type FeaturedImages = {
  [size: string]: FeaturedImageDetails;
};

interface Event {
  ID?: number,
  title?: string,
  content?: string,
  excerpt?: string,
  status?: string,
  name?: string,
  type?: string,
  date?: string,
  date_start?: string,
  date_end: string | null,
  location?: string,
  categories?: string[],
  featured_image: any // FeaturedImages[];
}

export class EventPopUp {
  wrapperId: string;
  wrapper: HTMLDivElement;
  eventPopUpLinks: HTMLAnchorElement[];

  constructor(elementId: string,) {
    this.wrapperId = elementId;
    // this.element = <HTMLDivElement>document.getElementById(this.elementId);
    this.wrapper = <HTMLDivElement>document.getElementById(this.wrapperId);
    this.eventPopUpLinks = [];
  }

  public init(): void {
    this.initEventListeners();
  }

  private getPopUpLinks(): HTMLAnchorElement[] {
    return Array.from(document.querySelectorAll('.event-popup-link'));
  }

  public initEventListeners(): void {
    this.getPopUpLinks().forEach(item => item.addEventListener('click', () => {
      // Get the event ID from the link's data attribute
      const eventId = item.dataset.eventId;


      // Create a FormData object to store the data to be sent with the AJAX request
      const formData = new FormData();
      formData.append('action', 'get_event_cpt');
      formData.append('event_id', String(eventId));

      // Make an AJAX call to retrieve the event content
      fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData,
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Error: ' + response.status);
          }
        })
        .then((eventContent) => {
          console.log(eventContent)
          this.wrapper.innerHTML = this.getPopUpContent(eventContent);

          document.querySelectorAll('.popup-button-close').forEach(button => {
            button.addEventListener('click', (event) => {
              if (event.target === button) {
                console.log(event.target)
                console.log(button)
                this.closePopUp();
              }
            })
          })

          this.togglePopUpVisibility();
        })
        .catch((error) => {
          console.error(error);
        });
    }));
  }

  private closePopUp(): void {
    this.wrapper.classList.add('hidden')
  };

  private togglePopUpVisibility(): void {
    this.wrapper.classList.contains('hidden') ? this.wrapper.classList.remove('hidden') : this.wrapper.classList.add('hidden')
  }

  private getPopUpContent({
    title,
    content,
    date_start,
    date_end,
    location,
    featured_image,
    categories }: Event): string {
    console.log(featured_image)
    return `
      <div class="absolute top-44 left-1/2 -translate-x-50 container mx-auto lg:max-w-prose">
        <button class="popup-button-close absolute top-0 right-0 w-6 h-6 bg-close bg-center bg-no-repeat bg-turquoise bg-[length:0.625rem_0.625rem]"></button>
        <div class="max-w-full aspect-popup-image">
        ${(featured_image.length > 0) ? `<img class="w-full h-full object-cover object-center" width="${featured_image['thumbnail'].width}" height="${featured_image['thumbnail'].height}" src="${featured_image['thumbnail'].url}" srcset="${Object.entries(featured_image).map(([size, details]) => `${details.url} ${details.width}w`).join(', ')}" loading="lazy" alt="">` : ''}
      </div>
        <div class="bg-white">
          <div class="grid grid-cols-12">
            <div class="col-span-12 md:col-span-7 p-4 text-xl uppercase space-y-2">
              ${date_start ? `<div>${formatDatetimeToShortMonthAndDay(date_start)}</div>` : ''}
              ${title ? `<h3>${title}</h3>` : ''}
            </div>
            <div class="col-span-12 md:col-span-5 p-4 bg-turquoise">
              <div class="flex justify-between">
                ${date_start ? `<div class="text-xl text-white tracking-widest">${formatDatetimeToTimeRange(date_start, date_end)}</div>` : ''}
                ${(categories && categories.length > 0) ? `<div class="flex flex-col space-y-1">${categories.map(category => `<div class="flex items-center justify-center px-3 py-1 rounded-2xl bg-white text-xs text-turquoise uppercase">${category}</div>`).join('')}</div>` : ''}
              </div>
              <div class="mt-3 text-2xs text-white uppercase">
                ${location ? `Helyszín | ${location}<br/>` : ''}
              </div>
            </div>
          </div>
          <div class="p-4 [&_p]:mb-4">
            ${content ? content : ''}
          </div>
        </div>
      </div>
    `;
  }
}