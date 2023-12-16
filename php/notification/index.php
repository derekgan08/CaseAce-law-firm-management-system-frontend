<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Notifications</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Notifications</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="row-1 nested-flex-con-col" id="notification-rows">

            </div>
        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        // Options for statistics graph later

        const getImage = (c) => {
            console.log(c.notification_type);
            switch (c.notification_type) {
                case "addDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;"width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/agreement-new.png" alt="agreement-new"/>'
                    break
                }
                case "editDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/rename.png" alt="rename"/>'
                    break;
                }
                case "deleteDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/agreement-delete.png" alt="agreement-delete"/>'
                    break;
                }
                case "assignedTask": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/clipboard.png" alt="agreement-delete"/>'
                    break;
                }
                case "finishedTask": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/task-completed.png" alt="agreement-delete"/>'
                    break;
                }
                case "newAppointment":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/event-accepted-tentatively.png" alt="new-appointment"/>'
                    break;
                }
                case "updateAppointment":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/create-new.png" alt="update-appointment"/>'
                    break;
                }
                case "removeAttendees":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/remove-user-male.png" alt="remove-attendees"/>'
                    break;
                }
                case "cancelAppointment":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/cancel.png" alt="cancel-appointment"/>'
                    break;
                }
                case "acceptAppointment":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/event-accepted.png" alt="accept-appointment"/>'
                    break;
                }
                case "declineAppointment":{
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/event-declined.png" alt="decline-appointment"/>'
                    break;
                }
                default: {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/push-notifications.png" alt="agreement-delete"/>'
                    break;
                }
            }
        }

        // Get cases from backend and display as table
        axios.get(`/api/statistics/notifications`, )
            .then(function(response) {
                // TODO: Convert into data and render it
                const notifications = response.data
                notifications.forEach(c => {
                    let img = getImage(c)
                    let background_c = c.read ? "e4e4e4" : "ffffff"
                    // Convert every cases into rows 
                    // TODO: This is dummy data. Change the dummy data into real data rows to be shown.
                    const markup = `
                        <div class="float-card row-1" style="height: 6rem; margin-bottom: 1rem; background-color: #${background_c};">
                        <a style="text-decoration: none;" href="${baseUrl}${c.notification_clicklink}">
                            <div class="nested-flex-con-row">
                                <div class="col-1">
                                ${img}
                                </div>
                                <div class="col-11">
                                    <div class="nested-flex-con-col row-1-statistics-notification">
                                        <div class="nested-flex-con-row row-1-statistics-notification">
                                            <div class="two-line-statistics">
                                                <div style="width: 100%;">
                                                    <p class="notification-time">${changeToReadableFormat(c.notification_sent_date)}</p>
                                                    <div class="big-number-statistics-block-notification">
                                                        <span class="big-number-statistics notifications">${c.notification}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    `
                    // const markup = '<tr>' +
                    //     '<td><a href="' + baseUrl + '/php/case/view.php?cid=' + c._id + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />NULL</a></td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '</tr>';
                    $('#notification-rows').append(markup);
                });

                // prepare table so that it can be sorted
                $('#case-allCase-table').tableSort({
                    animation: 'slide',
                    speed: 500
                });
            })
            .catch(function(error) {

                if (error.response.status === 401) {
                    launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                    setTimeout(function() {
                        localStorage.clear()
                        window.location.href = baseUrl + 'php/auth/login.php';
                    }, 1000);
                } else {
                    launchErrorModal(error.response.data.message)
                }
            });

        endLoader();
    </script>
</body>

</html>