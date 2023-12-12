// Open the modal
const appointmentModal_openModal = (id='multiAppointmentModal') => {
  const modalElement = document.getElementById(id);
  let modal = bootstrap.Modal.getInstance(modalElement);

  if (!modal) {
    // If modal instance doesn't exist, create a new one
    modal = new bootstrap.Modal(modalElement);
  }

  modal.show();
}


// Close the modal
const appointmentModal_closeModal = (id='multiAppointmentModal') => {
  const modalElement = document.getElementById(id);
  const modal = bootstrap.Modal.getInstance(modalElement);
  modal.hide();
}


// Set the modal title
const appointmentModal_setModalTitle = (modalTitleID, titleContent) => {
  const modalTitleEl = document.getElementById(modalTitleID);   
  modalTitleEl.textContent = titleContent;      // Set the title text
}


// Set the Save Button (it might be different content like 'Save' or 'Accept')
const appointmentModal_setSaveButton = (saveButtonID, buttonText, isDisable, classNames) => {
  const saveButtonEl = document.getElementById(saveButtonID);
  saveButtonEl.innerText = buttonText;
  saveButtonEl.disabled = isDisable;
  saveButtonEl.className = '';

  classNames.forEach(className => {
    saveButtonEl.classList.add(className);
  })
  
}


// Set the Close button (it might be different content like 'Close' or 'Cancel' or 'Decline')
const appointmentModal_setCloseButton = (closeButtonID, buttonText, isDisable, classNames) => {
  const closeButtonEl = document.getElementById(closeButtonID);
  closeButtonEl.innerText = buttonText;
  closeButtonEl.disabled = isDisable;
  closeButtonEl.className = '';

  classNames.forEach(className => {
    closeButtonEl.classList.add(className);
  })
  
}


// When clicking new appointment button, set the modal title and button style
const appointmentModal_setNewAppointmentModal = (modalTitleID, saveButtonID, closeButtonID) => {
  appointmentModal_setModalTitle(modalTitleID, 'New Task');

  appointmentModal_setSaveButton(saveButtonID, 'Create', false, ['btn', 'btn-primary', 'save-button']);

  appointmentModal_setCloseButton(closeButtonID, 'Close', false, ['btn', 'btn-light', 'close-button']);
}


// When clicking the appointment event created by user, show the form that can be edited or cancelled
const appointmentModal_setCreatedAppointmentModal = (modalTitleID, saveButtonID, closeButtonID, needDisable) => {
  appointmentModal_setModalTitle(modalTitleID, 'Assigned Task');

  appointmentModal_setSaveButton(saveButtonID, 'Save', needDisable, ['btn', 'btn-primary', 'save-button']);

  appointmentModal_setCloseButton(closeButtonID, 'Cancel', needDisable, ['btn', 'btn-danger', 'shadow']);
}


// When clicking the appointment event invitation, show the form to let user accept or decline
const appointmentModal_setInvitedAppointmentModal = (modalTitleID, saveButtonID, closeButtonID, title, acceptDisable, declineDisable) => {
  appointmentModal_setModalTitle(modalTitleID, title);

  appointmentModal_setSaveButton(saveButtonID, 'Accept', acceptDisable, ['btn', 'btn-success', 'shadow']);

  appointmentModal_setCloseButton(closeButtonID, 'Decline', declineDisable, ['btn', 'btn-danger', 'shadow']);
}


// To show the alert
const appointmentModal_showAlert = (alertID) => {
  document.getElementById(alertID).classList.add('show');
}


// To hide the alert after 5 seconds
const appointmentModal_hideAlert = (alertID) => {
  setTimeout( () => {
    document.getElementById(alertID).classList.remove('show');
  }, 3000);
}


// To call alert function
const appointmentModal_callAlert = (alertID) => {
  appointmentModal_showAlert(alertID);
  appointmentModal_hideAlert(alertID);
}
