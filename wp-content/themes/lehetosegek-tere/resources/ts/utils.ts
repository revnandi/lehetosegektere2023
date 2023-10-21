export const formatDatetimeToShortMonthAndDay = (dateString: string) => {
  const date = new Date(dateString);
  const options: Intl.DateTimeFormatOptions = { month: 'short', day: 'numeric' };
  const formattedDate = date.toLocaleString("hu-HU", options);
  const dateParts = formattedDate.split(" ");
  return `${dateParts[0]} ${dateParts[1]}`;
}

export const formatDatetimeToTimeRange = (dateStart: string, dateEnd: string | null): string => {
  const startDate = new Date(dateStart);
  let formattedTimeRange = startDate.toLocaleTimeString('hu-HU', { hour: '2-digit', minute: '2-digit' });

  if (dateEnd) {
    const endDate = new Date(dateEnd);
    formattedTimeRange += '-' + endDate.toLocaleTimeString('hu-HU', { hour: '2-digit', minute: '2-digit' });
  }

  return formattedTimeRange;
}