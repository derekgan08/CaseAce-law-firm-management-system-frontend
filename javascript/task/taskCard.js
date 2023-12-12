
const initAllTaskCards = (params) => {
    var dragContainer = document.querySelector('.drag-container');
    var itemContainers = [].slice.call(document.querySelectorAll('.board-column-content'));
    var columnGrids = [];
    var boardGrid;

    // Init the column grids so we can drag those items around.
    itemContainers.forEach(function (container) {
        var grid = new Muuri(container, {
            items: '.board-item',
            dragEnabled: true,
            dragSort: function () {
                return columnGrids;
            },
            dragContainer: dragContainer,
            dragAutoScroll: {
                targets: (item) => {
                    return [
                        { element: window, priority: 0 },
                        { element: item.getGrid().getElement().parentNode, priority: 1 },
                    ];
                }
            },
        })

            .on('dragInit', function (item) {
                item.getElement().style.width = item.getWidth() + 'px';
                item.getElement().style.height = item.getHeight() + 'px';
            })
            .on('dragReleaseEnd', function (item) {

                //if after drag still within same parent
                if (item.getGrid().getElement().parentNode.id.toString().includes(item.getElement().children[0].children[6].value)) {
                    const task_id = item.getElement().children[0].children[0].value
                    const task_description = item.getElement().children[0].children[1].value
                    const task_assignedBy = item.getElement().children[0].children[2].value
                    let task_assignedTo = item.getElement().children[0].children[3].value.split(',')
                    const poppedEmptyId = task_assignedTo.pop()

                    const task_deadline = item.getElement().children[0].children[4].value
                    const task_acceptanceCriteria = item.getElement().children[0].children[5].value
                    const task_status = item.getElement().children[0].children[6].value
                    const task_assignedDate = item.getElement().children[0].children[7].value
                    const task_title = item.getElement().children[0].children[8].value

                    const taskDetails = {
                        _id: task_id,
                        details: task_description,
                        task_assignedBy,
                        attendees: task_assignedTo,
                        task_deadline,
                        location: task_acceptanceCriteria,
                        task_status,
                        task_assignedDate,
                        title: task_title
                    }

                    appointmentForm_displayAppointmentForm(taskDetails)
                } else {
                    let currentParent = item.getGrid().getElement().parentNode.id.toString()
                    let newStatus = item.getGrid().getElement().parentNode.id.toString().slice(0, item.getGrid().getElement().parentNode.id.toString().length - 6)
                    const taskId = item.getElement().children[0].children[0].value
                    axios.put('/api/tasks/updateStatus/' + newStatus, { _id: taskId }).then((res) => {
                        // $( "#"+currentParent ).load(window.location.href + " #"+currentParent );
                        location.reload()
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
                    })

                }

                item.getElement().style.width = '';
                item.getElement().style.height = '';
                item.getGrid().refreshItems([item]);
            })
            .on('layoutStart', function () {
                boardGrid.refreshItems().layout();
            });

        columnGrids.push(grid);
    });

    // Init board grid so we can drag those columns around.
    boardGrid = new Muuri('.board', {
        dragEnabled: false,
        dragHandle: '.board-column-header'
    });

}