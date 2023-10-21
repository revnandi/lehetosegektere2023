import { Puzzle } from './components/puzzle';
import { Carousel } from './components/carousel';
import { WeekPicker } from './components/weekpicker';
import { EventPopUp } from './components/event-popup';
import { lazyLoad } from 'unlazy'
import { Gallery } from './components/gallery';


window.addEventListener('load', function () {
  lazyLoad();
  const puzzle = new Puzzle({ wrapperId: 'lt_puzzle' });
  // console.log(puzzle)

  const eventPopUp = new EventPopUp('lt_events_popup');

  const picker = new WeekPicker('lt_events_datepicker', 'lt_events_datepicker_next', 'lt_events_datepicker_prev', 'lt_events_datepicker_daybuttons_container', () => eventPopUp.initEventListeners());

  const smallCarousel = new Carousel(
    'lt_small_carousel',
    {
      rewind: true,
      type: 'fade',
      arrows: false,
      classes: {
        pagination: 'z-10 absolute bottom-0 left-0 w-full flex justify-center py-2 space-x-0.5 bg-white [&>li]:h-fit [&>li]:flex',
        page: 'w-2.5 h-2.5 bg-black rounded-full [&.is-active]:bg-turquoise'
      }
      // dots: '#lt_small_carousel_dots'
    }
  );

  const bigCarousel = new Carousel(
    'lt_big_carousel',
    {
      rewind: true,
      type: 'fade',
      arrows: false,
      classes: {
        pagination: 'z-10 absolute bottom-6 left-11 flex justify-center py-2 space-x-2 [&>li]:h-fit [&>li]:flex',
        page: 'w-4 h-4 bg-black rounded-full [&.is-active]:bg-turquoise'
      }
      // dots: '#lt_small_carousel_dots'
    }
  );

  const gallery = new Gallery(
    'lt_gallery',
    {
      rewind: true,
      type: 'fade',
      pagination: false,
      classes: {
        pagination: 'z-10 absolute bottom-6 left-11 flex justify-center py-2 space-x-2 [&>li]:h-fit [&>li]:flex',
        page: 'w-4 h-4 bg-black rounded-full [&.is-active]:bg-turquoise'
      }
      // dots: '#lt_small_carousel_dots'
    }
  );

  puzzle.init();
  smallCarousel.init();
  bigCarousel.init();
  eventPopUp.init();
  gallery.init();

  console.log(picker)
  console.log(eventPopUp)


  interface HTMLAnchorElementWithDataset extends HTMLAnchorElement {
    dataset: DOMStringMap & {
      slug: string;
      type: string;
    };
  }

  // Event handling
  function handleEvent(this: Element | HTMLInputElement, keyword: string, anchor?: HTMLAnchorElementWithDataset) {
    let target = (this instanceof Element) ? this : document.querySelector<HTMLElement>('.cat-list_item.active');

    if (target == null) {
      console.error("No active category!");
      target = document.querySelector<HTMLElement>('.cat-list_item'); // Select any category if none is active
    }

    if (anchor == undefined) anchor = target?.querySelector('a') as HTMLAnchorElementWithDataset;

    document.querySelectorAll<HTMLElement>('.cat-list_item').forEach((innerElem: HTMLElement) => {
      innerElem.classList.remove('text-turquoise', 'bg-white');
      innerElem.classList.add('text-white');
    });
    target?.classList.remove('text-white');
    target?.classList.add('text-turquoise', 'bg-white');

    fetch(
      '/wp-admin/admin-ajax.php',
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          action: 'filter_events',
          category: (anchor && anchor.dataset.slug) ? anchor.dataset.slug : '',
          type: (anchor && anchor.dataset.type) ? anchor.dataset.type : 'event',
          keyword: keyword,
          after: picker.getWeekRange().start,
          before: picker.getWeekRange().end
        })
      }
    )
      .then((response: Response) => {
        return response.text();
      })
      .then((text: string) => {
        document.querySelector<HTMLElement>('.project-tiles')!.innerHTML = text;
        eventPopUp.initEventListeners();
      })
      .catch((error: Error) => {
        console.error('Error:', error);
      });
  }
  // Init date filter stuff
  if (document.getElementById('lt_search_keyword_input')) {
    // Category click event listeners
    document.querySelectorAll<HTMLElement>('.cat-list_item').forEach((elem: HTMLElement) => {
      elem.addEventListener('click', function (this: HTMLElement, event: Event) {
        const anchor = this.querySelector('a') as HTMLAnchorElementWithDataset;
        const keyword = (document.getElementById('lt_search_keyword_input') as HTMLInputElement).value;
        handleEvent.call(this, keyword, anchor);
      });
    });

    // Search keyword input event listeners
    (document.getElementById('lt_search_keyword_input') as HTMLInputElement).addEventListener('input', function (this: HTMLInputElement) {
      const keyword = this.value;
      handleEvent.call(this, keyword);
    });
  }
  if (document.getElementById('lt_events_datepicker_next')) {
    (document.getElementById('lt_events_datepicker_next') as HTMLButtonElement).addEventListener('click', function (this: HTMLButtonElement) {
      const keyword = '';
      handleEvent.call(this, keyword);
    });
  }
  if (document.getElementById('lt_events_datepicker_prev')) {
    (document.getElementById('lt_events_datepicker_prev') as HTMLButtonElement).addEventListener('click', function (this: HTMLButtonElement) {
      const keyword = '';
      handleEvent.call(this, keyword);
    });
  }

});