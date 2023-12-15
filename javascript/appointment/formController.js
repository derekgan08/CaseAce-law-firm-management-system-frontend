// To initialize or recreate the attendee select component
const appointmentForm_attendeeDselect = (attendeeSelectEl, isDisabled = false) => {
  dselect(attendeeSelectEl, {
    search: true,
    maxHeight: '150px'
  }, isDisabled)
}


// To initialize or recreate the time select component
const appointmentForm_timeDselect = (timeselectEl, isDisabled = false) => {
  dselect(timeselectEl, {
    maxHeight: '150px'
  }, isDisabled)
}


// To initialize the attendee select options
const appointmentForm_initAttendeesOptions = (id, userList) => {
  const selectElement = document.getElementById(id);

  userList.forEach(attendee => {
    // Add the options to the select
    const option = new Option(attendee, attendee);
    selectElement.add(option);
  })

  // Create the select component using dselect
  appointmentForm_attendeeDselect(selectElement);
}


// To set the date picker's value
const appointmentForm_setDate = (id, value) => {
  $('#' + id).datepicker('setDate', value);
}


// To disable the date before the value given
const appointmentForm_setStartDate = (id, value) => {
  $('#' + id).datepicker('setStartDate', value);
}


// To initialize the date picker with some settings, then set the default value
const appointmentForm_initDatePicker = (id, value = moment()) => {
  value = value.format('YYYY-MM-DD');

  $('#' + id).datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    startDate: value
  })

  appointmentForm_setDate(id, value);
}


// Create end date respond to the start date, to ensure the end date is not before the start date
const appointmentForm_activateRespondEndDate = (start_date_id, end_date_id) => {

  // Event listener: When the start date change, check and change the end date
  $('#' + start_date_id).datepicker().on('changeDate', function (e) {
    const startDateValue = e.format();

    var endDateValue = $('#' + end_date_id).datepicker('getDate');
    endDateValue = moment(endDateValue).format('YYYY-MM-DD')

    // If the end date is before the start date, set the end date same as the start date and update the disable date
    if (moment(endDateValue).isBefore(startDateValue)) {
      appointmentForm_setDate(end_date_id, startDateValue);
      appointmentForm_setStartDate(end_date_id, startDateValue);
    }
    else {
      appointmentForm_setStartDate(end_date_id, startDateValue);  // Else, just update the disabled date
    }
  });
}


// To get the current time and round to 30 minutes, for example, 3:15 PM, it return the value 3:30 PM
const appointmentForm_getCurrentForStartTime = () => {
  // Get the current date and time
  const currentDate = new Date();

  // Extract current hour and minute
  let currentHour = currentDate.getHours();
  let currentMinute = currentDate.getMinutes();

  // Adjust minute to the nearest 30
  if (currentMinute >= 1 && currentMinute <= 29) {
    currentMinute = 30;
  } else if (currentMinute >= 31 && currentMinute <= 59) {
    currentMinute = 0;

    // Increment hour by 1
    currentHour += 1;
  }

  // To identify the time is AM or PM
  const period = currentHour < 12 ? 'AM' : 'PM';

  // Ensure the hour stays within the 12-hour format
  currentHour = currentHour % 12 || 12;

  const value = currentHour + ':' + (currentMinute === 0 ? '00' : currentMinute) + ' ' + period;
  return value;
}


// To initialize the start time options
const appointmentForm_initStartTime = (id, isNextDay) => {
  const startTimeSelect = document.getElementById(id);
  let selectValue;
  startTimeSelect.innerHTML = ''; // Clear all existing options

  // If next day, the default start time value is 8:00 AM
  if (isNextDay) {
    selectValue = '8:00 AM';
  }
  // Else, based on the current time, and make nearest time if necessary
  else {
    selectValue = appointmentForm_getCurrentForStartTime();
  }


  // Generate a range of option from 8 AM to 5:30 PM, step is 30 minutes
  for (let hours = 7; hours <= 17; hours++) {
    for (let minutes = 0; minutes < 60; minutes += 30) {
      const period = hours < 12 ? 'AM' : 'PM';
      const hour12 = hours % 12 || 12; // Convert 12 hours format
      const time = hour12 + ':' + (minutes === 0 ? '00' : minutes) + ' ' + period;
      const option = document.createElement('option');
      option.value = time;
      option.text = time.replace(' ', '\u00A0'); // Replace space with non-breaking space to prevent unexpected behaviour

      if (time === selectValue) {
        option.selected = true;
      }

      startTimeSelect.add(option);
    }
  }

  // Create the select component using dselect
  appointmentForm_timeDselect(startTimeSelect);

  startTimeSelect.disabled = true;
}


// To add 30 minutes for the time value
const appointmentForm_add30Minutes = (value) => {

  // Parse the input time string using Moment.js
  const inputTime = moment(value, 'h:mm A');

  // Add 30 minutes
  const resultTime = inputTime.add(30, 'minutes');

  // Format and return the result
  return resultTime.format('h:mm A');

}


// To initialize the end time options based on the selected start time option
const appointmentForm_initEndTime = (startTimeID, endTimeID) => {
  const startTimeSelect = document.getElementById(startTimeID);
  const endTimeSelect = document.getElementById(endTimeID);

  const startTimeValue = startTimeSelect.value;       // Get the start time value
  const endTimeValue = appointmentForm_add30Minutes(startTimeValue);  // Get the end time value, later selected

  endTimeSelect.innerHTML = ''; // Clear all existing options

  let optionFlag = false;   // To indicate the options can be added to the select element

  for (let hours = 7; hours <= 17; hours++) {
    for (let minutes = 0; minutes < 60; minutes += 30) {
      const period = hours < 12 ? 'AM' : 'PM';
      const hour12 = hours % 12 || 12; // Convert 0 to 12
      const time = hour12 + ':' + (minutes === 0 ? '00' : minutes) + ' ' + period;

      if (time === startTimeValue) {
        optionFlag = true;
      }

      if (optionFlag) {
        const option = document.createElement('option');
        option.value = time;
        option.textContent = time.replace(' ', '\u00A0'); // Replace space with non-breaking space to prevent unexpected behaviour

        if (time === endTimeValue) {
          option.selected = true;
        }

        endTimeSelect.add(option);
      }

    }
  }

  // Create the select component using dselect
  appointmentForm_timeDselect(endTimeSelect);
}


// Activate end time responding to the start time
const appointmentForm_activateRespondEndTime = (startTimeID, endTimeID) => {
  document.getElementById(startTimeID).addEventListener('change', () => {
    appointmentForm_initEndTime(startTimeID, endTimeID);
  });
}


// To initialize all the date and time
const appointmentForm_initDateAndTime = (startDateID, startTimeID, endDateID, endTimeID, isFirstTime) => {

  // Get the current time in the format HH:mm A (12-hour format)
  const currentTime = moment().format('h:mm A');

  // Define the cutoff time as 5:30 PM
  const cutoffTime = '5:30 PM';

  // Compare the current time with the cutoff time
  const isAfterCutoff = moment(currentTime, 'h:mm A').isAfter(moment(cutoffTime, 'h:mm A'));

  // If is exceed the cutoff time, then set the start date to next day
  if (isAfterCutoff) {
    // Get the tomorrow date, and initialize the start date and end date value, and activate responding end date
    const tomorrowDay = moment().add(1, 'days');

    if (isFirstTime) {
      appointmentForm_initDatePicker(startDateID, tomorrowDay);
      appointmentForm_initDatePicker(endDateID, tomorrowDay);
    }
    else {
      const day = moment(tomorrowDay).format('YYYY-MM-DD');
      appointmentForm_setStartDate(startDateID, day);
      appointmentForm_setDate(startDateID, day);

      appointmentForm_setStartDate(endDateID, day);
      appointmentForm_setDate(endDateID, day);
    }

    appointmentForm_initStartTime(startTimeID, true);
    appointmentForm_initEndTime(startTimeID, endTimeID);
  }
  // Else, current date
  else {

    if (isFirstTime) {
      appointmentForm_initDatePicker(startDateID);
      appointmentForm_initDatePicker(endDateID);
    }
    else {
      const day = moment().format('YYYY-MM-DD');
      appointmentForm_setStartDate(startDateID, day);
      appointmentForm_setDate(startDateID, day);

      appointmentForm_setStartDate(endDateID, day);
      appointmentForm_setDate(endDateID, day);
    }

    appointmentForm_initStartTime(startTimeID, false);
    appointmentForm_initEndTime(startTimeID, endTimeID);
  }
}


// To show or hide the time pickers
const appointmentForm_timePickerSwitch = (isChecked, startTimeDiv, endTimeDiv) => {
  // If the switch is on, hide the time pickers
  if (isChecked) {
    document.getElementById(startTimeDiv).style.display = 'none';
    document.getElementById(endTimeDiv).style.display = 'none';
  }
  // Else, show the time pickers
  else {
    document.getElementById(startTimeDiv).style.display = 'block';
    document.getElementById(endTimeDiv).style.display = 'block';
  }
}


// To hide the creator div
const appointementForm_hideCreator = (divID = 'appointment-multiForm-creatorDisplayDiv') => {
  document.getElementById(divID).style.display = 'none';
}

// Show creator div and give value
const appointmentForm_showCreator = (creatorName, divID = 'appointment-multiForm-creatorDisplayDiv', spanID = 'appointment-multiForm-creator') => {
  document.getElementById(divID).style.display = 'block';
  document.getElementById(spanID).innerText = creatorName;
}


// To remove the current user in the attendee list
const appointmentForm_removeUserAttendee = (attendeeSelectID = 'appointment-multiForm-attendeesSelect') => {
  const attendeeSelectEl = document.getElementById(attendeeSelectID);

  for (let i = attendeeSelectEl.options.length - 1; i >= 0; i--) {
    if (attendeeSelectEl.options[i].value.includes('delete')) {
      attendeeSelectEl.remove(i);
    }
  }

}


// Clear the modal validation state (except date and time inputs because they always have value, don't need validation)
const appointmentForm_clearFormValidation = (inputIDs) => {
  inputIDs.forEach(inputID => {
    inputElement = document.getElementById(inputID);
    inputElement.classList.remove('is-valid');
    inputElement.classList.remove('is-invalid');
  })
}


// Reset the form data
const appointmentForm_resetFormData = (titleID, attendeeSelectID, locationID, detailsID,
  startDateID, startTimeID, endDateID, endTimeID, allDaySwitchID) => {

  // For the text and textarea input, just set the value to empty string
  const textInputIDs = [titleID, locationID, detailsID];
  textInputIDs.forEach(textInputID => {
    const textElement = document.getElementById(textInputID);
    textElement.value = '';
  })

  // Reset the attendees' all options unselected, then need to use dselect to refresh its display
  const attendeeSelectElement = document.getElementById(attendeeSelectID);
  for (var i = 0; i < attendeeSelectElement.options.length; i++) {
    attendeeSelectElement.options[i].selected = false;
  }

  // To recreate the attendeeSelect to respond to the changes
  appointmentForm_attendeeDselect(attendeeSelectElement);

  // Initialize the time
  appointmentForm_initDateAndTime(startDateID, startTimeID, endDateID, endTimeID, false);

  // For switch, need to set the checked to false and trigger the event (Switch has a event listener)
  switchElement = document.getElementById(allDaySwitchID);
  switchElement.checked = false;
  switchElement.dispatchEvent(new Event('change'));
}


// To enable all the input fields except the attendee select and time select, they can recreate and enable back
const appointmentForm_enableFormInput = (inputIDs) => {
  inputIDs.forEach(inputID => {
    document.getElementById(inputID).disabled = false;
  })
}


// To check the title input
const appointmentForm_checkTitle = (titleElement) => {

  // Get the value and trim it (remove the spaces in front and behind the text)
  const titleValue = titleElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if (titleValue === '') {
    titleElement.classList.remove('is-valid');
    titleElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else {
    titleElement.classList.remove('is-invalid');
    titleElement.classList.add('is-valid');
  }

}


// To check the attendees select input
const appointmentForm_checkAttendees = (attendeesElement) => {
  const attendeesList = [];

  // Check each of the options, add the selected option to the array
  for (var i = 0; i < attendeesElement.options.length; i++) {
    if (attendeesElement.options[i].selected) {
      attendeesList.push(attendeesElement.options[i].value);
    }
  }

  // If the array does not have any option, then set is-invalid and remove is-valid class
  if (attendeesList.length == 0) {
    attendeesElement.classList.remove('is-valid');
    attendeesElement.classList.add('is-invalid');
  }
  // Else, set is-valid and remove is-invalid class
  else {
    attendeesElement.classList.remove('is-invalid');
    attendeesElement.classList.add('is-valid');
  }

}


// To check the location input
const appointmentForm_checkLocation = (locationElement) => {
  // Get the value and trim it (remove the spaces in front and behind the text)
  const locationValue = locationElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if (locationValue === '') {
    locationElement.classList.remove('is-valid');
    locationElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else {
    locationElement.classList.remove('is-invalid');
    locationElement.classList.add('is-valid');
  }
}


// To check the details textarea input
const appointmentForm_checkDetails = (detailsElement) => {
  // Get the value and trim it (remove the spaces in front and behind the text)
  const detailsValue = detailsElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if (detailsValue === '') {
    detailsElement.classList.remove('is-valid');
    detailsElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else {
    detailsElement.classList.remove('is-invalid');
    detailsElement.classList.add('is-valid');
  }
}


// To validate each of the form element, then submit the form
// Note: start date, start time, end date, end time and all-day switch don't need to check validity
const appointmentForm_submitAppointmentForm = (titleID, attendeeSelectID, locationID, detailsID,
  startDateID, startTimeID, endDateID, endTimeID, allDaySwitchID) => {

  const titleElement = document.getElementById(titleID);
  const titleIsValid = titleElement.classList.contains('is-valid');

  const attendeeSelectElement = document.getElementById(attendeeSelectID);
  const attendeeSelectIsValid = attendeeSelectElement.classList.contains('is-valid');

  const locationElement = document.getElementById(locationID);
  const locationIsValid = locationElement.classList.contains('is-valid');

  const detailsElement = document.getElementById(detailsID);
  const detailsIsValid = detailsElement.classList.contains('is-valid');

  const startDateElement = $('#' + startDateID)
  const startTimeElement = document.getElementById(startTimeID);
  const endDateElement = $('#' + endDateID)
  const endTimeElement = document.getElementById(endTimeID);
  const allDaySwitchElement = document.getElementById(allDaySwitchID);

  // If the inputs are valid, then extract the data and send to backend
  if (titleIsValid && attendeeSelectIsValid && locationIsValid && detailsIsValid) {
    const switchIsChecked = allDaySwitchElement.checked;

    const title = titleElement.value.trim();
    const attendees = [];
    const location = locationElement.value.trim();
    const dateStart = moment(startDateElement.datepicker('getDate')).format('YYYY-MM-DD');
    const timeStart = switchIsChecked ? '' : startTimeElement.value;
    const dateEnd = moment(endDateElement.datepicker('getDate')).format('YYYY-MM-DD');
    const timeEnd = switchIsChecked ? '' : endTimeElement.value;
    const details = detailsElement.value.trim();
    const status = 'scheduled';

    for (var i = 0; i < attendeeSelectElement.options.length; i++) {
      if (attendeeSelectElement.options[i].selected) {
        attendees.push({
          name: attendeeSelectElement.options[i].value,
          response: 'pending'
        });
      }
    }

    // Close the modal and showing the loading overlay
    appointmentModal_closeModal();    // Default modal is appointment form modal

    appointment = {
      creator: '',
      title: title,
      attendees: attendees,
      location: location,
      dateStart: dateStart,
      timeStart: timeStart,
      dateEnd: dateEnd,
      timeEnd: timeEnd,
      details: details,
      status: status
    }

    // Send axios post request to store the new appointment and 
    // fetch all appointments to redraw charts and calendar
    axios.post('/api/appointments', appointment)
      .then((response) => {
        const { username, isAdmin, appointments } = response.data;

        // If the user is admin, update the charts and recreate calendar
        if (isAdmin) {

          appointmentChart_updatePieChart('appointment-admin-pieChart', appointments);                    // Update pie chart
          appointmentChart_updateAreaChart('appointment-admin-areaChart', appointments);                  // Update area chart
          appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
        }
        // Else, only create the calendar
        else {
          appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
        }
      })
      .catch((err) => {
        if (err.response.status === 401) {
          launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')
  
          setTimeout(function () {
            localStorage.clear()
            window.location.href = baseUrl + 'php/auth/login.php';
          }, 1000);
        } else {
          launchErrorModal(err.response.data.message)
        }
      });
  }
  // Check the validity of inputs
  else {
    appointmentForm_checkTitle(titleElement);
    appointmentForm_checkAttendees(attendeeSelectElement);
    appointmentForm_checkLocation(locationElement);
    appointmentForm_checkDetails(detailsElement);
  }

}

// To display the created appointment's form details
const appointmentForm_displayCreatedFormData = (idEl, titleEl, attendeeSelectEl, locationEl, detailsEl,
  startDateID, startTimeEl, endDateID, endTimeEl, allDaySwitchEl, appointment, needDisable) => {

  // Show the creator name
  appointmentForm_showCreator('You');

  // Put the appointment id in hidden field
  idEl.innerText = appointment._id;

  // Get the title and display in form
  titleEl.value = appointment.title;
  titleEl.disabled = true;

  // Get the location and display in form
  locationEl.value = appointment.location;

  // Get the details and display in form
  detailsEl.value = appointment.details;

  // Get the attendee object and match with the options, mark as selected
  for (let j = 0; j < appointment.attendees.length; j++) {
    for (let i = 0; i < attendeeSelectEl.options.length; i++) {
      if (attendeeSelectEl.options[i].value === appointment.attendees[j].name) {
        attendeeSelectEl.options[i].selected = true;
      }
    }
  }

  // If the appointment does not have start time and end time, switch on all day switch, else off the switch and display the times
  if (appointment.timeStart === '' && appointment.timeEnd === '') {
    allDaySwitchEl.checked = true;
  }
  else {
    allDaySwitchEl.checked = false;

    // Set the selected start time
    for (let i = 0; i < startTimeEl.options.length; i++) {
      if (startTimeEl.options[i].value === appointment.timeStart) {
        startTimeEl.options[i].selected = true;
      }
    }

    // Set the selected end time
    for (let i = 0; i < endTimeEl.options.length; i++) {
      if (endTimeEl.options[i].value === appointment.timeEnd) {
        endTimeEl.options[i].selected = true;
      }
    }
  }

  // If the appointment is past, set all the input into disabled state
  if (needDisable) {
    // Set the text inputs to disabled
    locationEl.disabled = true;
    detailsEl.disabled = true;
    allDaySwitchEl.disabled = true;

    // Disable the attendee select, start and end time select while recreating them
    appointmentForm_attendeeDselect(attendeeSelectEl, true);
    appointmentForm_timeDselect(startTimeEl, true);
    appointmentForm_timeDselect(endTimeEl, true);

    // Disable the datepickers
    document.getElementById(startDateID).disabled = true;
    document.getElementById(endDateID).disabled = true;
  }
  else {
    // If it is active appointment, don't need set disabled but need to recreate the select components
    appointmentForm_attendeeDselect(attendeeSelectEl);
    appointmentForm_timeDselect(startTimeEl);
    appointmentForm_timeDselect(endTimeEl);
  }

  // Need to set the start date of datepicker so the past date can be shown
  appointmentForm_setStartDate(startDateID, appointment.dateStart);
  appointmentForm_setDate(startDateID, appointment.dateStart);
  appointmentForm_setDate(endDateID, appointment.dateEnd);

  // To call the switch change event listener
  allDaySwitchEl.dispatchEvent(new Event('change'));
}

// To display the invited appointment form
const appointmentForm_displayInvitedFormData = (idEl, titleEl, attendeeSelectEl, locationEl, detailsEl,
  startDateID, startTimeEl, endDateID, endTimeEl, allDaySwitchEl, appointment) => {

  // Show the creator name
  appointmentForm_showCreator(appointment.creator);

  // Put the appointment id in hidden field
  idEl.innerText = appointment._id;

  // Get the title and display in form
  titleEl.value = appointment.title;

  // Get the location and display in form
  locationEl.value = appointment.location;

  // Get the details and display in form
  detailsEl.value = appointment.details;

  // Find the user not present in options
  let currentUserNotInOptions = appointment.attendees.find(attendee => !attendeeSelectEl.querySelector(`option[value="${attendee.name}"]`));

  // Add the user not present in options as an option
  if (currentUserNotInOptions) {
    let newOption = document.createElement('option');
    newOption.value = `${currentUserNotInOptions.name} delete`;
    newOption.text = currentUserNotInOptions.name;
    attendeeSelectEl.add(newOption);
  }

  // Get the attendee objects and match with the options, mark as selected
  for (let j = 0; j < appointment.attendees.length; j++) {
    let attendee = appointment.attendees[j];
    let optionValue = (attendee.name === currentUserNotInOptions.name) ? `${attendee.name} delete` : attendee.name;
    let option = attendeeSelectEl.querySelector(`option[value="${optionValue}"]`);
    if (option) {
      option.selected = true;
    }
  }

  // If the appointment does not have start time and end time, switch on all day switch, else off the switch and display the times
  if (appointment.timeStart === '' && appointment.timeEnd === '') {
    allDaySwitchEl.checked = true;
  }
  else {
    allDaySwitchEl.checked = false;

    // Set the selected start time
    for (let i = 0; i < startTimeEl.options.length; i++) {
      if (startTimeEl.options[i].value === appointment.timeStart) {
        startTimeEl.options[i].selected = true;
      }
    }

    // Set the selected end time
    for (let i = 0; i < endTimeEl.options.length; i++) {
      if (endTimeEl.options[i].value === appointment.timeEnd) {
        endTimeEl.options[i].selected = true;
      }
    }
  }


  // Because it is invited appointments so all data cannot be edited by attendee user
  titleEl.disabled = true;
  locationEl.disabled = true;
  detailsEl.disabled = true;
  allDaySwitchEl.disabled = true;
  document.getElementById(startDateID).disabled = true;
  document.getElementById(endDateID).disabled = true;

  // Disable the attendee select, start and end time select while recreating them
  appointmentForm_attendeeDselect(attendeeSelectEl, true);
  appointmentForm_timeDselect(startTimeEl, true);
  appointmentForm_timeDselect(endTimeEl, true);

  // Need to set the start date of datepicker so the past date can be shown, and disable the datepickers
  appointmentForm_setStartDate(startDateID, appointment.dateStart);

  // Now, can display the start date and end date using id attribute
  appointmentForm_setDate(startDateID, appointment.dateStart);
  appointmentForm_setDate(endDateID, appointment.dateEnd);

  // To call the switch change event listener
  allDaySwitchEl.dispatchEvent(new Event('change'));

}

// To display the form when user clicking an event, there will different type of forms based on the event types
// Note: This function is used by calendar component in calendar.php
const appointmentForm_displayAppointmentForm = (eventType, appointment) => {

  const idEl = document.getElementById('appointment-multiForm-id');
  const titleEl = document.getElementById('appointment-multiForm-title');
  const attendeeSelectEl = document.getElementById('appointment-multiForm-attendeesSelect');
  const locationEl = document.getElementById('appointment-multiForm-location');
  const detailsEl = document.getElementById('appointment-multiForm-details');
  const startDateID = 'appointment-multiForm-startDate';
  const startTimeEl = document.getElementById('appointment-multiForm-startTime');
  const endDateID = 'appointment-multiForm-endDate';
  const endTimeEl = document.getElementById('appointment-multiForm-endTime');
  const allDaySwitchEl = document.getElementById('appointment-multiForm-allDaySwitch');

  let needDisable;

  // If the appointment is created by the user, the displayed can be edited and cancelled
  if (eventType.role === 'creator') {

    // If the appointment is already past, then all the form inputs are disabled and cannot do changes to the appointment
    if (eventType.status === 'past') {
      needDisable = true;
    }
    else {
      needDisable = false;
    }
    // Set the form to created form
    appointmentModal_setCreatedAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton', needDisable);

    // Display the data in the form
    appointmentForm_displayCreatedFormData(idEl, titleEl, attendeeSelectEl, locationEl, detailsEl, startDateID, startTimeEl, endDateID, endTimeEl, allDaySwitchEl, appointment, needDisable);

    // Open the modal
    appointmentModal_openModal();
  }
  // Else, the user can only respond to the appointment by accepting or declining the appointment
  else {

    // If the appointment is already past, user cannot do respond to the invited appointment
    if (eventType.status === 'past') {
      const modalTitle = eventType.response.charAt(0).toUpperCase() + eventType.response.slice(1);

      // Set the form to invited form, both buttons are disabled
      appointmentModal_setInvitedAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton', modalTitle + ' Appointment', true, true);
    }
    else {
      if (eventType.response === 'accepted') {
        appointmentModal_setInvitedAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton', 'Accepted Appointment', true, false);
      }
      else if (eventType.response === 'pending') {
        appointmentModal_setInvitedAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton', 'Pending Appointment', false, false);
      }
      else {
        appointmentModal_setInvitedAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton', 'Declined Appointment', false, true);
      }
    }

    // Display the data in the form
    appointmentForm_displayInvitedFormData(idEl, titleEl, attendeeSelectEl, locationEl, detailsEl, startDateID, startTimeEl, endDateID, endTimeEl, allDaySwitchEl, appointment);

    // Open the modal
    appointmentModal_openModal();
  }
}


// To check the title content has changed by user
const appointmentForm_checkTitleChange = (titleEl, titleData) => {
  const formTitleValue = titleEl.value.trim();

  if (formTitleValue !== titleData) {
    return true;
  }
  else {
    return false;
  }
}


// To check array1 have all elements in array2
function allElementsPresent(arr1, arr2) {
  // Check if all elements in arr2 are included in arr1
  return arr2.every(element => arr1.includes(element));
}


// To check the attendee has changed by user
const appointmentForm_checkAttendeeChange = (attendeeSelectEl, attendeeData) => {
  const oldAttendeeValue = [];
  const newAttendeeValue = [];

  // To get each of the attendee from the appointment
  attendeeData.forEach(attendee => {
    oldAttendeeValue.push(attendee.name);
  })

  // Get the attendee from the form
  for (var i = 0; i < attendeeSelectEl.options.length; i++) {
    if (attendeeSelectEl.options[i].selected) {
      newAttendeeValue.push(attendeeSelectEl.options[i].value);
    }
  }

  // Check if old attendee list has all the value in new attendee list and vice versa, means no change
  if (oldAttendeeValue.length == newAttendeeValue.length) {
    if (allElementsPresent(oldAttendeeValue, newAttendeeValue) && allElementsPresent(newAttendeeValue, oldAttendeeValue)) {
      return false;
    }
    else {
      return true;
    }
  }
  else {
    return true;
  }
}


// Check date value are equal or changed
const appointmentForm_checkDateChange = (dateEl, oldDate) => {
  const newDate = moment(dateEl.datepicker('getDate')).format('YYYY-MM-DD');

  if (oldDate == newDate) {
    return false;
  }
  else {
    return true;
  }
}


// Check time value change
const appointmentForm_checkTimeChange = (allDaySwitchEl, startTimeEl, endTimeEl, oldStartTime, oldEndTime) => {
  const switchOn = allDaySwitchEl.checked;

  // If the all day switch is on, time should be no value, but old start time and old end time has value, mean there is change
  // If the all day switch is off, time should be have value, and the old start time and old end time do not have value, mean there is change
  if ((switchOn && oldStartTime !== '' && oldEndTime !== '') || (!switchOn && oldStartTime === '' && oldEndTime === '')) {
    return true;
  }
  else {
    // If the switch is on, old start time and old end time do not have value, don't do comparison, return false
    if (switchOn) {
      return false;
    }
    else { // Then, compare start time and end time
      const newStartTime = startTimeEl.value;
      const newEndTime = endTimeEl.value;

      if (oldStartTime != newStartTime || oldEndTime != newEndTime) {
        return true;
      }
      else {
        return false;
      }
    }
  }
}


// Check the location change
const appointmentForm_checkLocationChange = (locationEl, oldLocation) => {
  const newLocation = locationEl.value.trim();

  if (oldLocation !== newLocation) {
    return true;
  }
  else {
    return false;
  }
}


// Check the details change
const appointmentForm_checkDetailsChange = (detailsEl, oldDetails) => {
  const newDetails = detailsEl.value.trim();

  if (oldDetails !== newDetails) {
    return true;
  }
  else {
    return false;
  }
}


// To check any data in the form is changed, then send updated data to the server
const appointmentForm_updateAppointmentForm = (titleID, attendeeSelectID, locationID, detailsID,
  startDateID, startTimeID, endDateID, endTimeID, allDaySwitchID) => {

  // check the input fields does not have invalid data except date and time
  // const titleEl = document.getElementById(titleID);
  // const titleIsInvalid = titleEl.classList.contains('is-invalid');

  const attendeeSelectEl = document.getElementById(attendeeSelectID);
  const attendeeSelectIsInvalid = attendeeSelectEl.classList.contains('is-invalid');

  const locationEl = document.getElementById(locationID);
  const locationIsInvalid = locationEl.classList.contains('is-invalid');

  const detailsEl = document.getElementById(detailsID);
  const detailsIsInvalid = detailsEl.classList.contains('is-invalid');

  const startDateEl = $('#' + startDateID)
  const startTimeEl = document.getElementById(startTimeID);
  const endDateEl = $('#' + endDateID)
  const endTimeEl = document.getElementById(endTimeID);
  const allDaySwitchEl = document.getElementById(allDaySwitchID);

  // If any invalid input, show the error alert
  if (attendeeSelectIsInvalid || locationIsInvalid || detailsIsInvalid) {
    appointmentModal_callAlert('appointment-multiForm-danger-alert');
  }
  // Else check is there any changes
  else {
    // Get the appointent id, later used for fetch the appointment from server
    const appointmentID = document.getElementById('appointment-multiForm-id').innerText;

    // Get the appointment data from server based on the id
    axios.get(`/api/appointments/${appointmentID}`)
      .then((response) => {
        const appointment = response.data;

        //const titleChanged = appointmentForm_checkTitleChange(titleEl, appointment.title);
        const attendeeChanged = appointmentForm_checkAttendeeChange(attendeeSelectEl, appointment.attendees);
        const startDateChanged = appointmentForm_checkDateChange(startDateEl, appointment.dateStart);
        const endDateChanged = appointmentForm_checkDateChange(endDateEl, appointment.dateEnd)
        const timeChanged = appointmentForm_checkTimeChange(allDaySwitchEl, startTimeEl, endTimeEl, appointment.timeStart, appointment.timeEnd);
        const locationChanged = appointmentForm_checkLocationChange(locationEl, appointment.location);
        const detailsChanged = appointmentForm_checkDetailsChange(detailsEl, appointment.details);

        if (attendeeChanged || startDateChanged || endDateChanged || timeChanged || locationChanged || detailsChanged) {

          if (attendeeChanged) {
            const oldAttendee = [];

            appointment.attendees.forEach(attendee => {
              oldAttendee.push(attendee.name);
            })

            const newAttendee = [];
            for (var i = 0; i < attendeeSelectEl.options.length; i++) {
              if (attendeeSelectEl.options[i].selected) {
                newAttendee.push(attendeeSelectEl.options[i].value);
              }
            }

            // Update the object's attendees property
            appointment.attendees = appointment.attendees
              .filter(attendee => newAttendee.includes(attendee.name)) // Keep only existing names
              .concat(newAttendee                                      // Add new names with default response
                .filter(name => !appointment.attendees.some(attendee => attendee.name === name))
                .map(name => ({ name, response: 'pending' }))
              );
          }

          if (startDateChanged) {
            appointment.dateStart = moment(startDateEl.datepicker('getDate')).format('YYYY-MM-DD');
          }

          if (endDateChanged) {
            appointment.dateEnd = moment(endDateEl.datepicker('getDate')).format('YYYY-MM-DD');
          }

          if (timeChanged) {
            if (allDaySwitchEl.checked) {
              appointment.timeStart = '';
              appointment.timeEnd = '';
            }
            else {
              appointment.timeStart = startTimeEl.value;
              appointment.timeEnd = endTimeEl.value;
            }
          }

          if (locationChanged) {
            appointment.location = locationEl.value.trim();
          }

          if (detailsChanged) {
            appointment.details = detailsEl.value.trim();
          }

          // Close the modal and showing the loading overlay
          appointmentModal_closeModal();    // Default modal is appointment form modal

          axios.put(`/api/appointments/${appointmentID}`, appointment)
            .then((response) => {
              const { username, isAdmin, appointments } = response.data;

              // If the user is admin, then update the charts and recreate calendar
              if (isAdmin) {

                appointmentChart_updatePieChart('appointment-admin-pieChart', appointments);                    // Update pie chart
                appointmentChart_updateAreaChart('appointment-admin-areaChart', appointments);                  // Update area chart
                appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
              }
              // Else, only create the calendar
              else {
                appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
              }
            })
            .catch((err) => {
              if (err.response.status === 401) {
                launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')
        
                setTimeout(function () {
                  localStorage.clear()
                  window.location.href = baseUrl + 'php/auth/login.php';
                }, 1000);
              } else {
                launchErrorModal(err.response.data.message)
              }
            });
        }
        else {
          appointmentModal_callAlert('appointment-multiForm-warning-alert');
        }

      })
      .catch((err) => {
        if (err.response.status === 401) {
          launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')
  
          setTimeout(function () {
            localStorage.clear()
            window.location.href = baseUrl + 'php/auth/login.php';
          }, 1000);
        } else {
          launchErrorModal(err.response.data.message)
        }
      });
  }

}


// To cancel the appointment from the database
const appointmentForm_cancelAppointment = () => {
  // Get the appointment id, later used it to cancel the appointment
  const appointmentID = document.getElementById('appointment-multiForm-id').innerText;

  // Close the modal and showing the loading overlay
  appointmentModal_closeModal('appointment-comfirmation-modal');    // Close the confirmation modal

  axios.delete(`/api/appointments/${appointmentID}`)
    .then((response) => {
      const { username, isAdmin, appointments } = response.data;

      // If the user is admin, then update the charts and recreate calendar
      if (isAdmin) {

        appointmentChart_updatePieChart('appointment-admin-pieChart', appointments);                    // Update pie chart
        appointmentChart_updateAreaChart('appointment-admin-areaChart', appointments);                  // Update area chart
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
      }
      // Else, only create the calendar
      else {
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
      }

    })
    .catch((err) => {
      if (err.response.status === 401) {
        launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

        setTimeout(function () {
          localStorage.clear()
          window.location.href = baseUrl + 'php/auth/login.php';
        }, 1000);
      } else {
        launchErrorModal(err.response.data.message)
      }
    });
}


// To accept the appointment
const appointmentForm_appointmentResponse = (userResponse) => {
  // Get the appointment id, later used it to cancel the appointment
  const appointmentID = document.getElementById('appointment-multiForm-id').innerText;

  // Close the modal and showing the loading overlay
  appointmentModal_closeModal();    // Default modal is appointment form modal

  axios.put(`/api/appointments/response/${appointmentID}`, { response: userResponse })
    .then((response) => {
      const { username, isAdmin, appointments } = response.data;

      // If the user is admin, then update the charts and recreate calendar
      if (isAdmin) {
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
      }
      // Else, only create the calendar
      else {
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Recreate calendar
      }

    })
    .catch((err) => {
      if (err.response.status === 401) {
        launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

        setTimeout(function () {
          localStorage.clear()
          window.location.href = baseUrl + 'php/auth/login.php';
        }, 1000);
      } else {
        launchErrorModal(err.response.data.message)
      }
    });
}
