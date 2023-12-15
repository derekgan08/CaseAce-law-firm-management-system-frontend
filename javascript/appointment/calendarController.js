// To format the time
// For example 2023-12-12 4 PM to 2023-12-12T16:00 (used for calendar)
const appointmentCalendar_formatTime = (startDate, startTime, endDate, endTime) => {

  const startEnd = {};

  // If it has start time, then combining start date and time, and store it in the object
  if(startTime){
    const startDateAndTime = `${startDate} ${startTime}`;
    startEnd.start = moment(startDateAndTime, 'YYYY-MM-DD h:mm A').format('YYYY-MM-DDTHH:mm');
  }
  else{  // Else, store the start date only
    startEnd.start = startDate;
  }
  
  // If it has end time, then combining end date and time, and store it in the object
  if(endTime){
    const endDateAndTime = `${endDate} ${endTime}`;
    startEnd.end = moment(endDateAndTime, 'YYYY-MM-DD h:mm A').format('YYYY-MM-DDTHH:mm');
  }
  else{ // Else, if the end date and start date are same day, return the day
    if(endDate === startDate)
      startEnd.end = endDate;
    else{ 
      // If the end date and start date are not the same day, 
      // add one more day to end date because the calendar will minus one day when displaying
      endDate = moment(endDate, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD');
      startEnd.end = endDate;
    }
  }

  return startEnd;
  
}


// To compare the end date and time is before current date and time
const appointmentCalendar_compareBeforeCurrentTime = (endTime) => {
  const currentTime = moment();   // Get the current date and time

  // Special case for all day event time, if it don't have time and compare to current time, it return true although they are same day
  if (!endTime.includes('T'))
    endTime = endTime + 'T24:00'

  return moment(endTime).isBefore(currentTime);
}


// Generate tooltip for each of the appointment events
const appointmentCalendar_generateTooltip = (timeStart, timeEnd, title) => {
  if(!timeStart && !timeEnd){
    return '<b>All day</b>' + '<br>' + title;
  }
  else{
    return '<b>' + timeStart + ' - ' + timeEnd + '</b><br>' + title;
  }
}


// Generate the events used for the calendar
const appointmentCalendar_createEvents = (appointments, username) => {
  const events = appointments.map(appointment => {        // Extract the data needed for an event object
    const isCreator = appointment.creator === username;   // Check the appointment is created by user

    const startEnd = appointmentCalendar_formatTime(appointment.dateStart, appointment.timeStart, appointment.dateEnd, appointment.timeEnd);
    const isBeforeCurrentTime = appointmentCalendar_compareBeforeCurrentTime(startEnd.end);  // To check the event is past

    let backgroundColor, textColor, borderColor, classNames;  // The attributes of the event in calendar
    let role, appointmentEventStatus, eventType;              // Attributes to indicate the event type (later used for event listener)

    if (isCreator) {      // If the user is creator
      role = 'creator';

      if (isBeforeCurrentTime) { // If the event is past, show it in fade color
        backgroundColor = '#00B3004D';
        borderColor = '#00B30080';
        textColor = '#00000066';
        classNames = ['fc-event-transparent'];

        appointmentEventStatus = 'past';
      }
      else {                      // If it is upcoming appointment, show it in exact color
        backgroundColor = '#00B300';
        borderColor = '#00B300B3';

        appointmentEventStatus = 'active';
      }

      eventType = {
        role: role,
        status: appointmentEventStatus
      }
    }
    else {    // Else, the user is attendee of the appointment

      role = 'attendee';

      // To get the user's response
      const userResponse = appointment.attendees.find(attendee => attendee.name === username).response;

      switch (userResponse) {       // Based on the user's response, set the color for the event
        case 'accepted':
          if (isBeforeCurrentTime) {
            backgroundColor = '#00B3004D';
            borderColor = '#00B30080';
            textColor = '#00000066';
            classNames = ['fc-event-transparent'];

            appointmentEventStatus = 'past';
          }
          else {
            backgroundColor = '#00B300';
            borderColor = '#00B300B3';

            appointmentEventStatus = 'active';
          }
          break;
        case 'pending':
          if (isBeforeCurrentTime) {
            backgroundColor = '#FFD7004D';
            borderColor = '#FFD70080';
            textColor = '#00000066';
            classNames = ['fc-event-transparent'];

            appointmentEventStatus = 'past';
          }
          else {
            backgroundColor = '#FFD700';
            borderColor = '#FFD700B3';
            textColor = '#000000';

            appointmentEventStatus = 'active';
          }
          break;
        case 'declined':
          if (isBeforeCurrentTime) {
            backgroundColor = '#FF00004D';
            borderColor = '#FF000080';
            textColor = '#00000066';
            classNames = ['fc-event-transparent'];

            appointmentEventStatus = 'past';
          }
          else {
            backgroundColor = '#FF0000';
            borderColor = '#FF0000B3';

            appointmentEventStatus = 'active';
          }
          break;
      }

      eventType = {
        role: role,
        response: userResponse,
        status: appointmentEventStatus
      }
    }

    // Tootlip for each event
    const tooltip =  appointmentCalendar_generateTooltip(appointment.timeStart, appointment.timeEnd, appointment.title);

    return {        // return each event, as a result it is an array of events
      title: appointment.title,
      start: startEnd.start,
      end: startEnd.end,
      id: appointment._id,
      backgroundColor: backgroundColor,
      textColor: textColor,
      borderColor: borderColor,
      classNames: classNames,
      appointment: appointment,     // appointment, eventType, and tooltip will be the object of extendedProps
      eventType: eventType,         // automcatically since they are user-defined property
      tooltip: tooltip
    }
  });

  return events;
}


// To create a calendar
const appointmentCalendar_createCalendar = (id, appointments, username, needFilter) => {

  // If the appointments haven't filter for the user, do filtering based on the username and appointment's status
  // Note: there are two cases, one case is request for all data for admin page, then need to filter here,
  //       another case is request for specific user's appointment (already filter in backend side), 
  //       don't need to filter here
  if (needFilter) {
    appointments = appointments.filter(appointment =>
      (appointment.creator === username ||    // If the user is creator or attendee of an appointment
        appointment.attendees.some(attendee => attendee.name === username)) &&
      appointment.status === 'scheduled'      // If the appointment is scheduled (not cancelled)
    )
  }

  // Create the appointment events for calendar
  const events = appointmentCalendar_createEvents(appointments, username);

  var calendarEl = document.getElementById(id);
  calendarEl.innerHTML = '';        // Clear the calendar element

  // Calendar settings
  var calendar = new FullCalendar.Calendar(calendarEl, {
    themeSystem: 'bootstrap5',      // To make the calendar suit to the Boostrap theme
    initialView: 'timeGridWeek',    // The initial view for the calendar
    headerToolbar: {                // The header toolbar above the calendar
      left: 'prev,next today',
      center: 'title',
      right: 'timeGridWeek,listMonth' // The options for the calendar's views
    },
    dayHeaderFormat: {weekday: 'short', day:'numeric'},
    //hiddenDays: [0, 6],               // To make the calendar only show Monday to Friday in time grid week
    slotMinTime: '07:00:00',            // To set the start time
    slotMaxTime: '19:00:00',            // To set the end time
    contentHeight: 'auto',              // To ensure the each time slot in calendar is same
    //aspectRatio: 1.95,                // The ratio of width to height (high ratio means smaller height)
    timeZone: 'UTC',
    nowIndicator: true,                 // To mark the current time
    now: moment().format('YYYY-MM-DDTHH:mm'),   // Used for current time indicator

    // The events to be shown on the calendar
    events: events,

    // Event listener to show the form for each event
    eventClick: function (info) {
      appointmentForm_displayAppointmentForm(info.event.extendedProps.eventType, info.event.extendedProps.appointment);
    },

    // To create the tooltip for each event (only in timeGridWeek view)
    eventDidMount: function(info) {
      if (info.view.type === 'timeGridWeek'){
        var tooltip = new bootstrap.Tooltip(info.el, {
          title: info.event.extendedProps.tooltip, // Tooltip content get from each event object's extendedProps
          placement: 'top',
          trigger: 'hover',
          container: 'body',
          html: true,                              // Allow html code in the content
          customClass: 'event-tooltip'             // Add class to tooltip to customize it
        });
      }
    }
  });

  // Render the calendar
  calendar.render();

  // A special call, first time render the calendar no problem, 
  // but after that if render it in small screen size and enlarge the screen size, it got problem, so use this method to solve
  calendar.destroy();
  calendar.render();
}