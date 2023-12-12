// Send axios request when the page is loaded, and do initialization for the form
document.addEventListener('DOMContentLoaded', function () {

  // To check the user's role, then decide want to display or hide the charts
  axios.get('/api/appointments/isAdmin')
    .then((response) => {
      const isAdmin = response.data;

      appointmentChart_displayCharts(isAdmin);  // To show or hide the charts

    }).catch((err) => {
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

  // To get the appointments, display them in charts and calendar
  axios.get('/api/appointments')
    .then((response) => {
      const { username, isAdmin, appointments } = response.data;

      // If the user is admin, then create the charts and calendar
      if (isAdmin) {
        appointmentChart_createPieChart('appointment-admin-pieChart', appointments);                    // Create pie chart
        appointmentChart_createAreaChart('appointment-admin-areaChart', appointments);                  // Create area chart
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Create calendar
      }
      // Else, only create the calendar
      else {
        appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Create calendar
      }

      endLoader();

    }).catch((err) => {
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

  // To get the appointments, display them in charts and calendar
  axios.get('/api/tasks/user')
    .then((response) => {
      const allTasks = (response.data);
      allTasks.forEach((task) => {
        let divToAppend;
        let assignees = ""
        task.assignedTo.forEach((a) => {
          assignees += a['userId'] + ","
        })

        const newTaskHTML = `<div class="board-item">
          <div class="board-item-content" onclick="appointmentForm_displayAppointmentForm('hi')">
            <input id="task_id" value="${task._id}" hidden/>
            <input id="task_description" value="${task.description}" hidden/>
            <input id="task_assignedBy" value="${task.assignedBy}" hidden/>
            <input id="task_assignedTo" value="${assignees}" hidden/>
            <input id="task_deadline" value="${task.deadline}" hidden/>
            <input id="task_acceptanceCriteria" value="${task.acceptanceCriteria}" hidden/>
            <input id="task_status" value="${task.status}" hidden/>
            <input id="task_assignedDate" value="${task.taskAssignedDate}" hidden/>
            <input id="task_title" value="${task.title}" hidden/>
            ${task.title}
          </div>
        </div>`
        if (task.status === 'todo') {
          divToAppend = "#todo-tasks .board-column-content"
        } else if (task.status === 'working') {
          divToAppend = "#working-tasks .board-column-content"
        } else if (task.status === 'done') {
          divToAppend = "#done-tasks .board-column-content"
        }
        $(divToAppend).append(newTaskHTML)
      })

      initAllTaskCards()


      // const { username, isAdmin, appointments } = response.data;

      // // If the user is admin, then create the charts and calendar
      // if (isAdmin) {
      //   appointmentChart_createPieChart('appointment-admin-pieChart', appointments);                    // Create pie chart
      //   appointmentChart_createAreaChart('appointment-admin-areaChart', appointments);                  // Create area chart
      //   appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Create calendar
      // }
      // // Else, only create the calendar
      // else {
      //   appointmentCalendar_createCalendar('appointment-admin-calendar', appointments, username, isAdmin);  // Create calendar
      // }

      endLoader();

    }).catch((err) => {
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


  // To send get request to get the attendee options list from server except the user himself/herself
  axios.get('/api/tasks/userlist')
    .then((response) => {
      const userList = response.data;
      appointmentForm_initAttendeesOptions('task-multiForm-attendeesSelect', userList); // Initialize select options

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


  // Initialize the Bootstrap tooltip before using it
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // Initialize all the default value for the form
  appointmentForm_initDateAndTime('task-multiForm-startDate', 'task-multiForm-startTime', 'task-multiForm-endDate', 'task-multiForm-endTime', true);

  // Add event listener to the end date so it can respond to the start date
  appointmentForm_activateRespondEndDate('task-multiForm-startDate', 'task-multiForm-endDate');

  // Add event listener to the end time so it can respond to the start time
  appointmentForm_activateRespondEndTime('task-multiForm-startTime', 'task-multiForm-endTime');
})


// To set the new appointment for modal title and button
document.getElementById('appointment-newAppointmentButton').addEventListener('click', () => {
  appointmentModal_setNewAppointmentModal('appointment-multiAppointmentModal-title', 'appointment-multiAppointmentModal-saveButton', 'appointment-multiAppointmentModal-closeButton');
})


// To control the displaying of the time pickers based on the switch
document.getElementById('task-multiForm-allDaySwitch').addEventListener('change', (event) => {
  appointmentForm_timePickerSwitch(event.target.checked, 'task-multiForm-startTimeDiv', 'task-multiForm-endTimeDiv');
});


// Add event listener to the save button of the form 
//(It will have many different types of events based on the type of the form)
document.getElementById('appointment-multiAppointmentModal-saveButton').addEventListener('click', () => {
  formType = document.getElementById('appointment-multiAppointmentModal-title').innerText

  switch (formType) {

    case 'New Task':
      appointmentForm_submitAppointmentForm('task-multiForm-title', 'task-multiForm-attendeesSelect', 'task-multiForm-location', 'task-multiForm-details',
        'task-multiForm-startDate', 'task-multiForm-startTime', 'task-multiForm-endDate', 'task-multiForm-endTime', 'task-multiForm-allDaySwitch');
      break;

    case 'Assigned Task':
      appointmentForm_updateAppointmentForm('task-multiForm-title', 'task-multiForm-attendeesSelect', 'task-multiForm-location', 'task-multiForm-details',
        'task-multiForm-startDate', 'task-multiForm-startTime', 'task-multiForm-endDate', 'task-multiForm-endTime', 'task-multiForm-allDaySwitch');
      break;

    case 'Pending Appointment':
    case 'Declined Appointment':
      appointmentForm_appointmentResponse('accepted');
      break;

    default:
      console.error('Save button: No case matching to the form type');

  }
})


// Add event listener to the close button of the form
//(It will have many different types of events based on the type of the form)
document.getElementById('appointment-multiAppointmentModal-closeButton').addEventListener('click', () => {
  formType = document.getElementById('appointment-multiAppointmentModal-title').innerText

  switch (formType) {
    case 'New Task':
      appointmentModal_closeModal();    // Default modal is appointment form modal
      break;

    case 'Assigned Task':
      appointmentModal_closeModal();    // Default modal is appointment form modal
      appointmentModal_openModal('appointment-comfirmation-modal');   // Open confirmation modal
      break;

    case 'Pending Appointment':
    case 'Accepted Appointment':
      appointmentForm_appointmentResponse('declined');
      break;

    default:
      console.error('Close button: No case matching to the form type');
  }
})


// To cancel the appointment when user confirm it
document.getElementById('appointment-confirmationModal-yes').addEventListener('click', () => {
  appointmentForm_cancelAppointment();
})


// Add a real-time validation event for the title input
document.getElementById('task-multiForm-title').addEventListener('input', () => {
  titleElement = document.getElementById('task-multiForm-title');
  appointmentForm_checkTitle(titleElement);
})


// Add a real-time validation event for the attendees select input
document.getElementById('task-multiForm-attendeesSelect').addEventListener('change', () => {
  attendeeSelectElement = document.getElementById('task-multiForm-attendeesSelect');
  appointmentForm_checkAttendees(attendeeSelectElement);
})

// Add a real-time validation event for the location input
document.getElementById('task-multiForm-location').addEventListener('input', () => {
  locationElement = document.getElementById('task-multiForm-location');
  appointmentForm_checkLocation(locationElement);
})


// Add a real-time validation event for the details textarea input
document.getElementById('task-multiForm-details').addEventListener('input', () => {
  detailsElement = document.getElementById('task-multiForm-details');
  appointmentForm_checkDetails(detailsElement);
})


// Add event listener when modal is closed, hide the creator part, remove the current user option, clear validation, enable input and reset data
document.getElementById('multiAppointmentModal').addEventListener('hidden.bs.modal', event => {
  appointementForm_hideCreator();
  appointmentForm_removeUserAttendee();
  appointmentForm_clearFormValidation(['task-multiForm-title', 'task-multiForm-attendeesSelect', 'task-multiForm-location', 'task-multiForm-details']);
  appointmentForm_enableFormInput(['task-multiForm-title', 'task-multiForm-startDate', 'task-multiForm-endDate', 'task-multiForm-allDaySwitch', 'task-multiForm-location', 'task-multiForm-details']);
  appointmentForm_resetFormData('task-multiForm-title', 'task-multiForm-attendeesSelect', 'task-multiForm-location', 'task-multiForm-details',
    'task-multiForm-startDate', 'task-multiForm-startTime', 'task-multiForm-endDate', 'task-multiForm-endTime', 'task-multiForm-allDaySwitch');
})
