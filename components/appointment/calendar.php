<!-- Calendar -->
<div class='row mt-3 mb-4'>
  <div class=col>

      <div class='card-body'>
        <div class="row" style="margin: 1rem;">
          <div class="col-3">
          <h3 class="h3-semibold-24">All Appointments</h3>
          </div>
          <div class="col-9">
            <!-- Button to trigger modal -->
            <button type='button' style="float:right;margin-right: 1rem;" id='appointment-newAppointmentButton' class='btn btn-primary mb-3' data-bs-toggle='modal' data-bs-target='#multiAppointmentModal'>
              <i class='bi bi-plus-square' aria-label='plus-square icon'></i>
              New Appointment
            </button>
          </div>
          
        </div>


        <div id='appointment-admin-calendar' style='height: 50vh'></div>
      </div>


  </div>
</div>