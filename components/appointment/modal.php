<!-- Modal -->
<div class='modal fade' id='multiAppointmentModal' data-bs-backdrop="static" data-bs-keyboard="false" tabindex='-1' aria-labelledby='multi-appointmentModalLabel' aria-hidden='true'>

  <!-- Locate large modal at center and scrollable -->
  <div class='modal-dialog modal-lg'>

    <!-- Content for the modal -->
    <div class='modal-content'>

      <!-- Header of the appointment modal -->
      <div class='modal-header bg-light'>
        <h1 class='modal-title fs-5' id='appointment-multiAppointmentModal-title'>New Appointment</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>

      <!-- Body content of the appointment modal -->
      <div class='modal-body'>

        <form id='appointment-multiForm'>

          <!-- A always hidden input, just to store the created appointment's id-->
          <span style='display: none' id='appointment-multiForm-id'></span>

          <!-- The title input section -->
          <div class='row mb-3'>
            <label for='appointment-multiForm-title' class='col-sm-2 col-form-label'>Title</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='appointment-multiForm-title' name='title' placeholder='Add title' required>

              <div class="invalid-feedback">
                Please provide a valid title.
              </div>
            </div>
          </div>

          <!-- The attendees select options -->
          <div class='row mb-3'>
            <label for='appointment-multiForm-attendeesSelect' class='col-sm-2 col-form-label'>Attendees</label>

            <div class='col-sm-8'>
              <select class='form-select' id='appointment-multiForm-attendeesSelect' name='attendees-select' multiple required>
                <option value="">Add attendees</option>
              </select>

              <div class="invalid-feedback">
                Please select at least one attendee.
              </div>
            </div>

          </div>

          <!-- The start date and time input,  and one hidden disabled start time display (used for showing value only) -->
          <div class='row mb-3'>
            <label class='col-sm-2 col-form-label'>Start</label>

            <div class='col-lg-3 col-md-4 col-sm-4'>
              <input type='text' class='form-control' id='appointment-multiForm-startDate' name='start-date'>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 px-1' id='appointment-multiForm-startTimeDiv'>
              <select  class='form-select' id='appointment-multiForm-startTime' name='start-time'>
              </select>
            </div>

          </div>

          <!-- The end date and time input, and one hidden disabled end time display (used for showing value only) -->
          <div class='row mb-3'>
            <label class='col-sm-2 col-form-label'>End</label>

            <div class='col-lg-3 col-md-4 col-sm-4'>
              <input type='text' class='form-control' id='appointment-multiForm-endDate' name='end-date'>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 px-1' id='appointment-multiForm-endTimeDiv'>
              <select  class='form-select' id='appointment-multiForm-endTime' name='end-time'>
              </select>
            </div>

            <!-- The All day switch-->
            <div class='col-lg-2 col-md-3 col-sm-3 d-flex align-items-center' id='appointment-multiForm-switchDiv'>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="appointment-multiForm-allDaySwitch">
                <label class="form-check-label" for="appointment-multiForm-allDaySwitch">All day</label>
              </div>
            </div>

          </div>

          <!-- The appointment location input -->
          <div class='row mb-3'>
            <label for='appointment-multiForm-location' class='col-sm-2 col-form-label'>Location</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='appointment-multiForm-location' name='location' placeholder='Add location' required>
            
              <div class="invalid-feedback">
                Please provide a valid location.
              </div>
            </div>
            
          </div>

          <!-- The appointment details input -->
          <div class='row mb-3'>
            <label for='appointment-multiForm-details' class='col-sm-2 col-form-label'>Details</label>

            <div class='col-sm-8'>
              <textarea class='form-control' id='appointment-multiForm-details' name='details' rows='3' placeholder='Write more details for this appointment' required></textarea>
              
              <div class="invalid-feedback">
                Please provide some details.
              </div>
            </div>
            
          </div>

          <!-- Show creator, cannot write by user, it automatically show-->
          <div class='row mb-3' id='appointment-multiForm-creatorDisplayDiv' style='display: none'>
            <label for='appointment-multiForm-hidden-input' class='col-5 col-form-label fw-bold fst-italic'>
              Created by,<br>
              <span id='appointment-multiForm-creator'><span>
            </label>

            <div class='col-sm-3' style='display: none'>
              <input type='text' id='appointment-multiForm-hidden-input'>
            </div>
            
          </div>
          
        </form>

        <div class="alert alert-warning" role="alert" id='appointment-multiForm-warning-alert'>
          You have not make any changes.
        </div>

        <div class="alert alert-danger" role="alert" id='appointment-multiForm-danger-alert'>
          Please ensure all data is valid
        </div>

      </div>

      <!-- Footer of the appointment modal -->
      <div class='modal-footer bg-light'>
        <button type='button' id='appointment-multiAppointmentModal-closeButton' class='btn btn-light'>Close</button>
        <button type='button' id='appointment-multiAppointmentModal-saveButton' class='btn btn-primary'>Save</button>
      </div>

    </div>

  </div>

</div>

<!-- Another confirmation modal-->
<div class="modal fade" id='appointment-comfirmation-modal' data-bs-backdrop="static" data-bs-keyboard="false" tabindex='-1' aria-labelledby='comfirmation modal' aria-hidden='true'>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Header of the confirmation modal -->
      <div class='modal-header bg-light'>
        <h1 class='modal-title fs-5'>Confirmation</h1>
      </div>

      <div class="modal-body">
        Are you sure you want to cancel this appointment?
      </div>

      <!-- Footer of the confirmation modal -->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-light close-button" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger shadow" id='appointment-confirmationModal-yes'>Yes</button>
      </div>

    </div>
  </div>
</div>