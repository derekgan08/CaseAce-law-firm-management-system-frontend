<!-- Modal -->
<div class='modal fade' id='multiAppointmentModal' data-bs-backdrop="static" data-bs-keyboard="false" tabindex='-1' aria-labelledby='multi-appointmentModalLabel' aria-hidden='true'>

  <!-- Locate large modal at center and scrollable -->
  <div class='modal-dialog modal-lg'>

    <!-- Content for the modal -->
    <div class='modal-content'>

      <!-- Header of the appointment modal -->
      <div class='modal-header bg-light'>
        <h1 class='modal-title fs-5' id='appointment-multiAppointmentModal-title'>New Task</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>

      <!-- Body content of the appointment modal -->
      <div class='modal-body'>

        <form id='task-multiForm'>

          <!-- A always hidden input, just to store the created appointment's id-->
          <span style='display: none' id='task-multiForm-id'></span>

          <!-- The title input section -->
          <div class='row mb-3'>
            <label for='task-multiForm-title' class='col-sm-2 col-form-label'>Task Title</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='task-multiForm-title' name='title' placeholder='Add task title' required>

              <div class="invalid-feedback">
                Please provide a valid task title.
              </div>
            </div>
          </div>

          <!-- The attendees select options -->
          <div class='row mb-3'>
            <label for='task-multiForm-attendeesSelect' class='col-sm-2 col-form-label'>Assignee(s)</label>

            <div class='col-sm-8'>
              <select class='form-select' id='task-multiForm-attendeesSelect' name='attendees-select' multiple required>
                <option value="">Add assignee(s)</option>
              </select>

              <div class="invalid-feedback">
                Please select at least one assignee.
              </div>
            </div>

          </div>

          <!-- The start date and time input,  and one hidden disabled start time display (used for showing value only) -->
          <div class='row mb-3'>
            <label class='col-sm-2 col-form-label'>Due Date</label>

            <div class='col-lg-3 col-md-4 col-sm-4'>
              <input type='text' class='form-control' id='task-multiForm-startDate' name='start-date'>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 px-1' id='task-multiForm-startTimeDiv'>
              <select class='form-select' id='task-multiForm-startTime' name='start-time'>
              </select>
            </div>

          </div>

          <div class='col-lg-2 col-md-3 col-sm-3 px-1' style="display:none !important" id='task-multiForm-endTimeDiv'>
            
          </div>

          <!-- The All day switch-->
          <div class='col-lg-2 col-md-3 col-sm-3 d-flex align-items-center' style="display:none !important" id='task-multiForm-switchDiv'>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="task-multiForm-allDaySwitch">
              <label class="form-check-label" for="task-multiForm-allDaySwitch">All day</label>
            </div><div class='col-lg-3 col-md-4 col-sm-4'>
              <input type='text' class='form-control' id='task-multiForm-endDate' name='end-date'>
            </div>
            <select class='form-select' id='task-multiForm-endTime' name='end-time'>
            </select>
          </div>

          <!-- The appointment location input -->
          <div class='row mb-3'>
            <label for='task-multiForm-location' class='col-sm-2 col-form-label'>Acceptance Criteria</label>

            <div class='col-sm-8'>
              <!-- <input type='text' class='form-control' id='task-multiForm-location' name='location' placeholder='Add location' required> -->
              <textarea class='form-control' id='task-multiForm-location' name='location' rows='2' placeholder='Write task acceptance criteria(s)' required></textarea>

              <div class="invalid-feedback">
                Please provide some acceptance criteria.
              </div>
            </div>

          </div>

          <!-- The appointment details input -->
          <div class='row mb-3'>
            <label for='task-multiForm-details' class='col-sm-2 col-form-label'>Description</label>

            <div class='col-sm-8'>
              <textarea class='form-control' id='task-multiForm-details' name='details' rows='3' placeholder='Write more details for this appointment' required></textarea>

              <div class="invalid-feedback">
                Please provide some description.
              </div>
            </div>

          </div>

          <!-- Show creator, cannot write by user, it automatically show-->
          <div class='row mb-3' id='task-multiForm-creatorDisplayDiv' style='display: none'>
            <label for='task-multiForm-hidden-input' class='col-5 col-form-label fw-bold fst-italic'>
              Created by,<br>
              <span id='task-multiForm-creator'><span>
            </label>

            <div class='col-sm-3' style='display: none'>
              <input type='text' id='task-multiForm-hidden-input'>
            </div>

          </div>

        </form>

        <div class="alert alert-warning" role="alert" id='task-multiForm-warning-alert'>
          You have not make any changes.
        </div>

        <div class="alert alert-danger" role="alert" id='task-multiForm-danger-alert'>
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
        Are you sure you want to delete this task?
      </div>

      <!-- Footer of the confirmation modal -->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-light close-button" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger shadow" id='appointment-confirmationModal-yes'>Yes</button>
      </div>

    </div>
  </div>
</div>