import { Puzzle } from "./components/puzzle";
import { Carousel } from "./components/carousel";
import { WeekPicker } from "./components/weekpicker";
import { EventPopUp } from "./components/event-popup";
import { lazyLoad } from "unlazy";
import { Gallery } from "./components/gallery";

window.addEventListener("load", function () {
  lazyLoad("img[data-custom-lazy]");
  const puzzle = new Puzzle({
    wrapperId: "lt_puzzle",
    innerId: "lt_puzzle_inner",
    notificationId: "lt_puzzle_notification",
  });

  const eventPopUp = new EventPopUp("lt_events_popup");

  const picker = new WeekPicker(
    "lt_events_datepicker",
    "lt_events_datepicker_next",
    "lt_events_datepicker_prev",
    "lt_events_datepicker_daybuttons_container",
    () => eventPopUp.initEventListeners()
  );

  eventPopUp.loadEventContentFromUrl();

  // const smallCarousel = new Carousel("lt_small_carousel", {
  //   rewind: true,
  //   type: "fade",
  //   arrows: false,
  //   classes: {
  //     pagination:
  //       "z-10 absolute bottom-0 left-0 w-full flex justify-center py-2 space-x-0.5 bg-white [&>li]:h-fit [&>li]:flex",
  //     page: "w-2.5 h-2.5 bg-black rounded-full [&.is-active]:bg-turquoise",
  //   },
  //   // dots: "#lt_small_carousel_dots"
  // });

  const bigCarousels: Carousel[] = [];
  const bigCarouselWrappers = document.querySelectorAll(".lt_splide");

  if (bigCarouselWrappers && bigCarouselWrappers.length > 0) {
    bigCarouselWrappers.forEach(wrapper => {
      const newCarusel = new Carousel(wrapper as HTMLElement, {
        rewind: true,
        type: "fade",
        arrows: false,
        lazyLoad: true,
        classes: {
          pagination:
            "z-10 absolute bottom-6 left-11 flex justify-center py-2 space-x-2 [&>li]:h-fit [&>li]:flex",
          page: "w-4 h-4 bg-black rounded-full [&.is-active]:bg-turquoise",
        },
        // dots: "#lt_small_carousel_dots"
      });

      bigCarousels.push(newCarusel)
    })
  }

  const bigAltCarousels: Carousel[] = [];
  const bigAltCarouselWrappers = document.querySelectorAll(".lt_splide_alt");

  if (bigAltCarouselWrappers && bigAltCarouselWrappers.length > 0) {
    bigAltCarouselWrappers.forEach(wrapper => {
      const newCarusel = new Carousel(wrapper as HTMLElement, {
        rewind: true,
        type: "fade",
        arrows: false,
        lazyLoad: true,
        pagination: false,
        classes: {
          pagination: "z-10 absolute bottom-6 left-11 flex justify-center py-2 space-x-2 [&>li]:h-fit [&>li]:flex",
          page: "w-4 h-4 bg-black rounded-full [&.is-active]:bg-turquoise",
        },
        // dots: "#lt_small_carousel_dots"
      });

      bigAltCarousels.push(newCarusel)

      const prevButtons = wrapper.querySelectorAll(".lt_button_prev")

      prevButtons.forEach(item => item.addEventListener("click", () => {
        newCarusel.prev()
      }))

      const nextButtons = wrapper.querySelectorAll(".lt_button_next")

      nextButtons.forEach(item => item.addEventListener("click", () => {
        newCarusel.next()
      }))
    })

  }

  const gallery = new Gallery("lt_gallery", {
    rewind: true,
    type: "fade",
    pagination: false,
    lazyLoad: true,
    classes: {
      pagination:
        "z-10 absolute bottom-6 left-11 flex justify-center py-2 space-x-2 [&>li]:h-fit [&>li]:flex",
      page: "w-4 h-4 bg-black rounded-full [&.is-active]:bg-turquoise",
    },
    // dots: "#lt_small_carousel_dots"
  });

  puzzle.init();
  // smallCarousel.init();
  // bigCarousel.init();
  eventPopUp.init();
  gallery.init();

  console.log(bigCarousels)

  bigCarousels.forEach(carousel => carousel.init())
  bigAltCarousels.forEach(carousel => carousel.init())

  // console.log(picker);
  // console.log(eventPopUp);

  interface HTMLAnchorElementWithDataset extends HTMLAnchorElement {
    dataset: DOMStringMap & {
      slug: string;
      type: string;
    };
  }

  // Event handling
  function handleEvent(
    this: Element | HTMLInputElement,
    keyword: string,
    anchor?: HTMLAnchorElementWithDataset
  ) {
    let target =
      this instanceof Element
        ? this
        : document.querySelector<HTMLElement>(".cat-list_item.active");

    if (target == null) {
      console.error("No active category!");
      target = document.querySelector<HTMLElement>(".cat-list_item"); // Select any category if none is active
    }

    if (anchor == undefined)
      anchor = target?.querySelector("a") as HTMLAnchorElementWithDataset;

    document
      .querySelectorAll<HTMLElement>(".cat-list_item")
      .forEach((innerElem: HTMLElement) => {
        innerElem.classList.remove("text-turquoise", "bg-white");
        innerElem.classList.add("text-white");
      });
    if (
      target?.classList.contains(".cat-list_item")
    ) {
      target?.classList.remove("text-white");
      target?.classList.add("text-turquoise", "bg-white");
    }

    const afterDate = new Date((picker.selectedDay ? picker.selectedDay : picker.getWeekRange().start)).toISOString();
    // @ts-expect-error
    const beforeDate = new Date(picker.selectedDay ? picker.getEndOfSelectedDay() : picker.getWeekRange().end).toISOString();

    fetch("/wp-admin/admin-ajax.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        action: "filter_events",
        category: anchor && anchor.dataset.slug ? anchor.dataset.slug : "",
        type: anchor && anchor.dataset.type ? anchor.dataset.type : "event",
        keyword: keyword,
        after: afterDate,
        before: beforeDate
      }),
    })
      .then((response: Response) => {
        return response.text();
      })
      .then((text: string) => {
        const currrentChildNodes = document.getElementById("lt_event_grid")?.childNodes!;
        // Filter out the #text stuff
        const filteredCurrrentChildNodes = Array.from(currrentChildNodes).filter(
          node => node.nodeType == 1
        )
        const parser = new DOMParser();
        const parsedNewHtml = parser.parseFromString(text, "text/html");

        filteredCurrrentChildNodes?.forEach((child, index) => {
            if (index > 0) child.remove()
          }
        )

        Array.from(parsedNewHtml.body.children).forEach((element) => {
          document.getElementById("lt_event_grid")!.append(element);
       });

        eventPopUp.initEventListeners();
      })
      .catch((error: Error) => {
        console.error("Error:", error);
      });
  }
  // Init date filter stuff
  if (document.getElementById("lt_search_keyword_input")) {
    // Category click event listeners
    document
      .querySelectorAll<HTMLElement>(".cat-list_item")
      .forEach((elem: HTMLElement) => {
        elem.addEventListener(
          "click",
          function (this: HTMLElement, event: Event) {
            const anchor = this.querySelector(
              "a"
            ) as HTMLAnchorElementWithDataset;
            const keyword = (
              document.getElementById(
                "lt_search_keyword_input"
              ) as HTMLInputElement
            ).value;
            handleEvent.call(this, keyword, anchor);
          }
        );
      });

    // Search keyword input event listeners
    (
      document.getElementById("lt_search_keyword_input") as HTMLInputElement
    ).addEventListener("keydown", function (this: HTMLInputElement, event: KeyboardEvent) {
      if (event.key === "Enter") {
        event.preventDefault();
        const keyword = this.value;
        handleEvent.call(this, keyword);
      }
    });
  }
  if (document.getElementById("lt_events_datepicker_next")) {
    (
      document.getElementById("lt_events_datepicker_next") as HTMLButtonElement
    ).addEventListener("click", function (this: HTMLButtonElement) {
      const keyword = "";
      handleEvent.call(this, keyword);
    });
  }
  if (document.getElementById("lt_events_datepicker_prev")) {
    (
      document.getElementById("lt_events_datepicker_prev") as HTMLButtonElement
    ).addEventListener("click", function (this: HTMLButtonElement) {
      const keyword = "";
      handleEvent.call(this, keyword);
    });
  }
  if (this.document.getElementById("lt_events_datepicker_daybuttons_container")) {
    (
      document.getElementById("lt_events_datepicker_daybuttons_container")?.querySelectorAll("button").forEach((button, index) => {
        button.addEventListener("click", function (this: HTMLButtonElement) {
          const dayNumber = (button as HTMLElement).dataset.day;
          if (!dayNumber) return;
          picker.selectDay(Number(dayNumber), index)
          const keyword = "";
          handleEvent.call(this, keyword);
        });
      })
    )
  }
  if (document.getElementById("lt_events_datepicker_month_next")) {
    (
      document.getElementById("lt_events_datepicker_month_next") as HTMLButtonElement
    ).addEventListener("click", function (this: HTMLButtonElement) {
      picker.nextMonth();
      const keyword = "";
      handleEvent.call(this, keyword);
    });
  }
  if (document.getElementById("lt_events_datepicker_month_prev")) {
    (
      document.getElementById("lt_events_datepicker_month_prev") as HTMLButtonElement
    ).addEventListener("click", function (this: HTMLButtonElement) {
      picker.previousMonth();
      const keyword = "";
      handleEvent.call(this, keyword);
    });
  }
  // Handle anchor scrolling
  const extractHash = (url: string): string => {
    const lastHashtagIndex = url.lastIndexOf("#");
    const lastHashtag = url.substring(lastHashtagIndex);
    return lastHashtag;
  };

  const isUrlOnCurrentPage = (url: string): boolean => {
    const parts = url.split("#");
    const textName = parts[0];
    const path = this.location.pathname;

    return path.replace(/\//g, "") === textName.replace(/\//g, "");
  };

  const anchors = document
    .getElementById("primary-menu")
    ?.querySelectorAll("a");
  const anchorArray = anchors ? Array.from(anchors) : [];

  anchorArray
    .filter((anchor: HTMLAnchorElement) => {
      const href = anchor.getAttribute("href");
      return href && href.includes("#");
    })
    .forEach((anchor: HTMLAnchorElement) => {
      const href = anchor.getAttribute("href");
      if (href) {
        const targetHash = extractHash(href);
        if (isUrlOnCurrentPage(href)) {
          anchor.addEventListener("click", (event) => {
            event.preventDefault();
            const targetElement = document.querySelector(targetHash)
            if (targetElement) targetElement.scrollIntoView({ behavior: "smooth" });
          });
        }
      }
    });

  // Desktop header scroll animation
  const header: HTMLElement | null = document.getElementById("lt_header");
  const sticky: number = header ? header.offsetTop : 80;

  let lastScrollTop: number = 0;

  window.onscroll = (): void => {
    const scrollTop: number = window.scrollY || document.documentElement.scrollTop;
    const isScrollingUp: boolean = scrollTop < lastScrollTop - 10;
    const isScrollingDown: boolean = scrollTop > lastScrollTop;

    if (isScrollingDown) {
      header?.classList.remove("header-on-top");
    }
    if (isScrollingUp) {
      header?.classList.add("header-on-top");
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
  };

  // 

  window.addEventListener('hashchange', function (event) {
    // Your function here
  });

});