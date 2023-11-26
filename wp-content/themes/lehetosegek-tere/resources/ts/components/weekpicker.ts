import * as pikaday from 'pikaday';
import { format, startOfWeek, addWeeks, addDays, endOfDay, getMonth, subMonths, addMonths } from 'date-fns'
import { hu } from 'date-fns/locale';


const i18n = {
	previousMonth	: 'Előző hónap',
	nextMonth		: 'Következő hónap',
  months: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],
  weekdays: ['Vasárnap', 'Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat'],
  weekdaysShort: ['V', 'H', 'K', 'Sz', 'Cs', 'P', 'Sz']
};

export class WeekPicker {
  picker: pikaday;
  selectedWeek: Date; // to store the start of the selected week
  selectedDay: Date | null; // to store the selected day of the week if any
  selectedMonth: number;
  nextButtonId: string;
  prevButtonId: string;
  dayButtonContainerId: string;
  elementId: string;
  pageChangeCallback: () => any;

  constructor(elementId: string, nextButtonId: string, prevButtonId: string, dayButtonContainerId: string, pageChangeCallback: () => any) {
    this.picker = new pikaday({
      field: document.getElementById(elementId),
      pickWholeWeek: true,
      defaultDate: new Date(),
      setDefaultDate: true,
      i18n: i18n,
      firstDay: 1,
      format: 'D/M/YYYY',
      toString: (date: Date) => this.getWeekString(date),
    });
    this.pageChangeCallback = pageChangeCallback;
    this.nextButtonId = nextButtonId;
    this.prevButtonId = prevButtonId;
    this.elementId = elementId;
    this.dayButtonContainerId = dayButtonContainerId;

    const initialDate = this.picker.getDate();
    if (initialDate) {
      this.selectedWeek = initialDate;
    } else {
      // In case there is no initial date, we can set current date as a default
      this.selectedWeek = new Date();
      this.picker.setDate(this.selectedWeek);
    }
    
    this.selectedDay = null;
    this.selectedMonth = getMonth(this.selectedWeek);
    this.setMonth();

    this.initButtonListeners(nextButtonId, prevButtonId, dayButtonContainerId);
  }


  private getWeekString(date: Date): string {
    let dayOfWeek = date.getDay();
    let startOfWeek = new Date(date);
    startOfWeek.setDate(date.getDate() - ((dayOfWeek === 0 ? 7 : dayOfWeek) - 1)); // if Sunday (0), make it 7

    const options: Intl.DateTimeFormatOptions = { month: 'short', day: 'numeric' };
    let startOfWeekString = startOfWeek.toLocaleString('hu-HU', options);

    let endOfWeek = new Date(startOfWeek);
    endOfWeek.setDate(startOfWeek.getDate() + 6);

    let endOfWeekString = endOfWeek.toLocaleString('hu-HU', options);

    return `${startOfWeekString}-${endOfWeekString}`;
  }

  public nextWeek(): void {
    let current = this.picker.getDate();
    if (current) {
      const startOfCurrentWeek = startOfWeek(current, { weekStartsOn: 1 });
      const startOfNextWeek = addWeeks(startOfCurrentWeek, 1);

      this.picker.setDate(startOfNextWeek);
      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
      this.resetSelectedDay();
    }
    this.pageChangeCallback();
  }

  public previousWeek(): void {
    let current = this.picker.getDate();
    if (current) {
      const startOfCurrentWeek = startOfWeek(current, { weekStartsOn: 1 });
      const startOfLastWeek = addWeeks(startOfCurrentWeek, -1);

      this.picker.setDate(startOfLastWeek);
      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
      this.resetSelectedDay();
    }
    this.pageChangeCallback();
  }

  public nextMonth() {
    let current = this.picker.getDate();
    if (current) {
      const startOfNextMonth = startOfWeek(addMonths(this.selectedWeek, 1), { weekStartsOn: 1 });

      this.picker.setDate(startOfNextMonth);
      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
      this.resetSelectedDay();
    }
    this.pageChangeCallback();
  }

  public previousMonth() {
    let current = this.picker.getDate();
    if (current) {
      const startOfPreviousMonth = startOfWeek(subMonths(this.selectedWeek, 1), { weekStartsOn: 1 });

      this.picker.setDate(startOfPreviousMonth);
      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
      this.resetSelectedDay();
    }
    this.pageChangeCallback();
  }

  public setMonth(): void {
    this.selectedMonth = getMonth(this.selectedWeek);
    const monthLabel = document.getElementById("lt_events_datepicker_month");
    if(!monthLabel) return;
    monthLabel.innerText = format(new Date(this.selectedWeek), 'LLLL', { locale: hu }); 
  }

  private initButtonListeners(nextButtonId: string, prevButtonId: string, dayButtonContainerId: string): void {
    const prevButtonElement = document.getElementById(prevButtonId);
    const nextButtonElement = document.getElementById(nextButtonId);

    if (nextButtonElement) nextButtonElement.addEventListener('click', () => {
      this.nextWeek();
    });

    if (prevButtonElement) prevButtonElement.addEventListener('click', () => {
      this.previousWeek();
    });
  }

  public resetSelectedDay() {
    this.selectedDay = null;

    // Add a non existent index so there are no matches, kind of a hack... 
    this.updateDayButtonClassesAndData(-1)
  }

  public selectDay(dayIndex: number, buttonIndex: number): void {
    this.updateDayButtonClassesAndData(buttonIndex);
    this.updateSelectedDay(dayIndex);
  }

  private updateDayButtonClassesAndData(selectedIndex: number): void {
    const dayButtonContainer = document.getElementById(this.dayButtonContainerId);

    if (!dayButtonContainer) return;
    const dayButtons = [...dayButtonContainer.children];

    dayButtons.forEach((value: Element, index: number) => {
      const button = value as HTMLButtonElement;
      if (index === selectedIndex) {
        button.dataset.active = "true";
        button.classList.add('bg-black', 'text-turquoise');
        button.classList.remove('bg-white', 'text-black');
        // if(button.dataset.active === "true") {
        //   this.resetSelectedDay()
        //   button.dataset.active = "false";
        //   button.classList.add('bg-white', 'text-black');
        //   button.classList.remove('bg-black', 'text-turquoise');
        // }
      } else {
        button.dataset.active = "false";
        button.classList.add('bg-white', 'text-black');
        button.classList.remove('bg-black', 'text-turquoise');
      }
     });
  }

  private updateSelectedWeek(): void {
    let current = this.picker.getDate();
    if (current) {
      this.selectedWeek = new Date(current.getFullYear(), current.getMonth(), current.getDate() - current.getDay() + 1);
      this.setMonth();
    }
  }

  private updateSelectedDay(dayIndex: number | null): void {
    if (dayIndex !== null) {
      this.selectedDay = this.getDayOfWeekDate(this.selectedWeek, dayIndex);
    } else {
      this.selectedDay = null;
    }
  }

  private getDayOfWeekDate(date: Date, dayIndex: number): Date {
    // Get the start of the week (Monday) for the given date
    const startOfWeekDate = startOfWeek(date, { weekStartsOn: 1 });

    // Add the number of days to reach the desired day of the week
    const dayOfWeekDate = addDays(startOfWeekDate, dayIndex === 0 ? 6 : dayIndex - 1);

    return dayOfWeekDate;
  }

  public getSelectedWeek(): Date {
    return new Date(this.selectedWeek);
  }

  public getSelectedDay(): Date | null {
    return this.selectedDay ? new Date(this.selectedDay) : null;
  }

  public getWeekRange(): { start: string, end: string } {
    const start = startOfWeek(new Date(this.selectedWeek), { weekStartsOn: 1 })
    const end = new Date(start);
    end.setDate(start.getDate() + 6); // set to Sunday of the current week

    const startDateString = this.formatDate(start);
    const endDateString = this.formatDate(end);

    return { start: startDateString, end: endDateString };
  }

  public getEndOfSelectedDay() {
    if (this.selectedDay) {
      return endOfDay(this.selectedDay);
    } else {
      return null;
    }
  }

  private formatDate(date: Date): string {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
  }
}
