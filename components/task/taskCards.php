<!-- Calendar -->
<div class='row mt-3 mb-4'>
  <div class=col>

    <div class='card-body'>
      <div class="row" style="margin: 1rem;">
        <div class="col-3">
          <h3 class="h3-semibold-24">All Tasks</h3>
        </div>
        <div class="col-9">
          <!-- Button to trigger modal -->
          <button type='button' style="float:right;margin-right: 1rem;" id='appointment-newAppointmentButton' class='btn btn-primary mb-3' data-bs-toggle='modal' data-bs-target='#multiAppointmentModal'>
            <i class='bi bi-plus-square' aria-label='plus-square icon' style="margin-right: 0.5rem"></i>
            Assign New Task
          </button>
        </div>

      </div>


      <div class="drag-container"></div>
      <div class="board">
        <div class="board-column todo">
          <div class="board-column-container">
            <div class="board-column-header">Todo</div>
            <div class="board-column-content-wrapper" id="todo-tasks">
              <div class="board-column-content">
                
              </div>
            </div>
          </div>
        </div>
        <div class="board-column working">
          <div class="board-column-container">
            <div class="board-column-header">Working</div>
            <div class="board-column-content-wrapper" id="working-tasks">
              <div class="board-column-content">
                
              </div>
            </div>
          </div>
        </div>
        <div class="board-column done">
          <div class="board-column-container">
            <div class="board-column-header">Done</div>
            <div class="board-column-content-wrapper" id="done-tasks">
              <div class="board-column-content">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id='appointment-admin-calendar' style='height: 50vh; display: none'></div>

  </div>
</div>