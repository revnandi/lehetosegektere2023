import * as pikaday from 'pikaday';

export class WeekPicker {
  picker: pikaday;
  selectedWeek: Date; // to store the start of the selected week
  selectedDay: Date | null; // to store the selected day of the week if any
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
      current.setDate(current.getDate() + 7);
      this.picker.setDate(current);
      
      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
    }
    this.pageChangeCallback();
  }

  public previousWeek(): void {
    let current = this.picker.getDate();
    if (current) {
      current.setDate(current.getDate() - 7);
      this.picker.setDate(current);

      this.updateSelectedWeek();
      this.updateSelectedDay(null); // as day is not selected yet after switching the week, set this to null
    }
    this.pageChangeCallback();
  }

  private initButtonListeners(nextButtonId: string, prevButtonId: string, dayButtonContainerId: string): void {
    const prevButtonElement = document.getElementById(prevButtonId);
    const nextButtonElement = document.getElementById(nextButtonId);

    if(nextButtonElement) nextButtonElement.addEventListener('click', () => {
      this.nextWeek();

    });

    if(prevButtonElement) prevButtonElement.addEventListener('click', () => {
      this.previousWeek();
    });

    const dayButtonContainer = document.getElementById(dayButtonContainerId);
    if(!dayButtonContainer) return;

    const dayButtons = [...dayButtonContainer.children];

    for (let i = 0; i < dayButtons.length; i++) {
      dayButtons[i].addEventListener('click', () => this.selectDay(i));
    }
  }

  private selectDay(dayIndex: number): void {
    this.updateDayButtonClasses(dayIndex);

    let current = this.picker.getDate();
    if (current) {
      current.setDate(current.getDate() - current.getDay() + dayIndex + 1);
      this.picker.setDate(current);

      this.updateSelectedDay(dayIndex);
    }
    console.log(current)
    console.log(this.getWeekRange())
  }

  private updateDayButtonClasses(selectedIndex: number): void {
    const dayButtonContainer = document.getElementById(this.dayButtonContainerId);

    if(!dayButtonContainer) return;
    const dayButtons = [...dayButtonContainer.children];

    dayButtons.forEach((button, index) => {
      if (index === selectedIndex) {
        button.classList.add('bg-black', 'text-white');
        button.classList.remove('bg-white', 'text-black');
      } else {
        button.classList.add('bg-white', 'text-black');
        button.classList.remove('bg-black', 'text-white');
      }
    });
  }

  private updateSelectedWeek(): void {
    let current = this.picker.getDate();
    if (current) {
      this.selectedWeek = new Date(current.getFullYear(), current.getMonth(), current.getDate() - current.getDay() + 1);
    }
  }

  private updateSelectedDay(dayIndex: number | null): void {
    if (dayIndex !== null) {
      this.selectedDay = new Date(this.selectedWeek.getFullYear(), this.selectedWeek.getMonth(), this.selectedWeek.getDate() + dayIndex);
    } else {
      this.selectedDay = null;
    }
  }

  public getSelectedWeek(): Date {
    return new Date(this.selectedWeek);
  }

  public getSelectedDay(): Date | null {
    return this.selectedDay ? new Date(this.selectedDay) : null;
  }

  public getWeekRange(): { start: string, end: string } {
    const start = new Date(this.selectedWeek.getTime());
    start.setDate(start.getDate() - start.getDay() + 1); // set to Monday of current week
    const end = new Date(start.getTime());
    end.setDate(start.getDate() + 6); // set to Sunday of the current week

    const startDateString = this.formatDate(start);
    const endDateString = this.formatDate(end);

    return { start: startDateString, end: endDateString };
  }

  private formatDate(date: Date): string {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
  }
}
