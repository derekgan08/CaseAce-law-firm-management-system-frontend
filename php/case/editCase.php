<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Create Case</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Edit Case</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <form id='createCase-Form' style="flex-direction: column; justify-content: center; align-items: center;">
                <div class="float-card row-1" style="min-height: 85vh;">
                    <link href="./css/case/create.css" rel="stylesheet" />
                        <h3 class="h3-semibold-24">
                            Case Info
                        </h3>
                            <div class="create-new-case1-case-info1">
                                <div class="create-new-case1-container03">
                                    <span class="create-new-case1-case-title">Case Title</span>
                                    <input type="text" placeholder="Enter Case Title (Required)" required class="create-new-case1-input-case-title input" maxlength="50"/>
                                    <div class="invalid-feedback">
                                        Please provide a valid title.
                                    </div>
                                    <div class="create-new-case1-container04">
                                    <div class="create-new-case1-container05">
                                        <span class="create-new-case1-case-type">Case Type</span>
                                        <input type="text" placeholder="e.g. Individual" required class="create-new-case1-textinput input" maxlength="12"/>
                                    </div>
                                    <div class="create-new-case1-container06">
                                        <span class="create-new-case1-case-status">Case Status</span>
                                        <input type="text" placeholder="e.g. Open" required class="create-new-case1-textinput1 input" maxlength="12"/>
                                    </div>
                                    <div class="create-new-case1-container07">
                                        <span class="create-new-case1-priority">Priority</span>
                                        <input type="text" placeholder="e.g. Urgent" required class="create-new-case1-textinput2 input" maxlength="12"/>
                                    </div>
                                    <div class="create-new-case1-container08">
                                        <span class="create-new-case1-total-billed-hour">
                                        Total Billed Hour
                                        </span>
                                        <input type="text" placeholder="Integer Only" required pattern="\d+" class="create-new-case1-textinput3 input" maxlength="12"/>
                                        <div class="invalid-feedback">
                                            Please enter a valid integer for Total Billed Hour.
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="create-new-case1-container09">
                                    <span class="create-new-case1-case-description">Description</span>
                                    <textarea placeholder="Enter Case Description" required class="create-new-case1-textarea textarea"></textarea>
                                </div>
                            </div>
                            <h3 class="h3-semibold-24" style="margin-top: 2rem;">Assign Client</h3>
                            <div class="table-section" style="overflow-y: auto; max-height: 175px;">
                                <table id="create-allClient-table" class="table-general">
                                    <thead>
                                        <tr>
                                            <th class="col-2" style="width: 5%;" !important></th>
                                            <th class="col-1" style="width: 5%;"></th>
                                            <th class="col-1" style="width: 22.5%;">Name</th>
                                            <th class="col-1" style="width: 22.5%;">Role</th>
                                            <th class="col-2" style="width: 22.5%;">Phone Number</th>
                                            <th class="col-2" style="width: 22.5%;">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <h3 class="h3-semibold-24" style="margin-top: 2rem;">Assign Staff</h3>
                            <div class="table-section" style="overflow-y: auto; max-height: 175px;">
                                <table id="create-allStaff-table" class="table-general">
                                    <thead>
                                        <tr>
                                            <th class="col-2" style="width: 5%;"></th>
                                            <th class="col-1" style="width: 5%;"></th>
                                            <th class="col-1" style="width: 22.5%;">Name</th>
                                            <th class="col-1" style="width: 22.5%;">Role</th>
                                            <th class="col-2" style="width: 22.5%;">Phone Number</th>
                                            <th class="col-2" style="width: 22.5%;">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>
                <div class="create-new-case1-container14" style="width: 100%">
                    <button type="button" class="create-new-case1-button button" onclick="cancelButtonClick()">
                    Cancel
                    </button>
                    <!-- <button type="submit" class="create-new-case1-button1 button" onsubmit="submitForm()"> -->
                    <button type="submit" class="create-new-case1-button1 button">
                    Submit
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        const urlParams = new URLSearchParams(window.location.search);
        const caseId = urlParams.get('cid');

            axios.get(`/api/crm`, )
                .then(function(response) {
                    // TODO: Convert into data and render it
                    const clientData = response.data.filter(user => user.type === 'client');
                    if(clientData.length===0) 
                        $('#record-not-found-div').css("display", "block")
                    else 
                        $('#record-not-found-div').css("display", "none")
                    clientData.forEach((client, index) => {
                        avatar_url = client.avatar_url;

                        if(avatar_url === ""){
                            avatar_url = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                        } else {                            

                        }
                        
                        const markup = '<tr>' +
                            '<td style="width: 5%; text-align: center;"><input type="checkbox" class="client-checkbox" /></td>' +
                            '<td style="width: 5%; text-align: center;"><img src="' + client.avatar_url + '" alt="" class="client-avatar" /></td>' +
                            '<td style="display:none; text-align: center;">' + client._id + '</td>' +
                            '<td style="width: 15%; max-width: 100px; text-align: center;">' + client.username + '</td>' +
                            '<td style="width: 15%; max-width: 100px; text-align: center;">' + client.type + '</td>' +
                            '<td style="width: 15%; max-width: 100px; text-align: center;">' + client.number + '</td>' +
                            '<td style="width: 45%; max-width: 300px; text-align: center;">' + client.address + '</td>' +
                            '</tr>';
                        $('#create-allClient-table tbody').append(markup);
                    });

                    // prepare table so that it can be sorted
                    $('#create-allClient-table').tableSort({
                        animation: 'slide',
                        speed: 500
                    });

                    axios.get(`/api/crm/employee`, )
                        .then(function(response) {

                        const staffData = response.data.filter(user => user.type !== 'client');
                        if(staffData.length===0) 
                            $('#record-not-found-div').css("display", "block")
                        else 
                            $('#record-not-found-div').css("display", "none")
                            staffData.forEach((staff, index) => {

                            avatar_url = staff.avatar_url;

                            if(avatar_url === ""){
                                avatar_url = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                            } else {                            

                            }

                            const markup = '<tr>' +
                                '<td style="width: 5%; text-align: center;"><input type="checkbox" class="staff-checkbox" /></td>' +
                                '<td style="width: 5%; text-align: center;"><img src="' + avatar_url + '" alt="" class="client-avatar" /></td>' +
                                '<td style="display:none; text-align: center;">' + staff._id + '</td>' +
                                '<td style="width: 15%; max-width: 100px; text-align: center;">' + staff.username + '</td>' +
                                '<td style="width: 15%; max-width: 100px; text-align: center;">' + staff.type + '</td>' +
                                '<td style="width: 15%; max-width: 100px; text-align: center;">' + staff.number + '</td>' +
                                '<td style="width: 45%; max-width: 300px; text-align: center;">' + staff.address + '</td>' +
                                '</tr>';
                            $('#create-allStaff-table tbody').append(markup);
                        });

                        // prepare table so that it can be sorted
                        $('#create-allStaff-table').tableSort({
                            animation: 'slide',
                            speed: 500
                        });

                        axios.get('/api/cases/' + caseId, )
                            .then(function(response) {
                                
                                const caseData = response.data
                                if(caseData.length===0) 
                                    $('#record-not-found-div').css("display", "block")
                                else 
                                    $('#record-not-found-div').css("display", "none")

                                // document.querySelector(".faq--01 h1").innerHTML = json[0].title;

                                document.querySelector('.create-new-case1-input-case-title').value = caseData.case_title;
                                document.querySelector('.create-new-case1-textarea').value = caseData.case_description;
                                document.querySelector('.create-new-case1-textinput').value = caseData.case_type;
                                document.querySelector('.create-new-case1-textinput1').value = caseData.case_status;
                                document.querySelector('.create-new-case1-textinput2').value = caseData.case_priority;
                                document.querySelector('.create-new-case1-textinput3').value = caseData.case_total_billed_hour;

                                // document.querySelector('.case-client-name0').textContent = caseData.case_client_list[0].case_member_id;

                                const caseClientList = caseData.case_member_list.filter(user => user.case_member_type === 'client');

                                const caseStaffList = caseData.case_member_list.filter(user => user.case_member_type !== 'client');

                                // Iterate through the staff members in the table and check the checkboxes
                                for (let i = 0; i < caseClientList.length; i++) {
                                    const clientId = caseClientList[i].case_member_id;
                                    const checkbox = $(`#create-allClient-table tbody tr:has(td:eq(2):contains('${clientId}')) .client-checkbox`);
                                    checkbox.prop('checked', true);
                                }

                                // Iterate through the staff members in the table and check the checkboxes
                                for (let i = 0; i < caseStaffList.length; i++) {
                                    const staffId = caseStaffList[i].case_member_id;
                                    const checkbox = $(`#create-allStaff-table tbody tr:has(td:eq(2):contains('${staffId}')) .staff-checkbox`);
                                    checkbox.prop('checked', true);
                                }

                                endLoader();

                            })
                            .catch(function(error) {
                                const {
                                    status
                                } = error.response
                                if (status === 401) {
                                    localStorage.clear()
                                    window.location.href = baseUrl + 'php/auth/login.php';
                                }
                                $('#record-not-found-div').css("display", "block")
                            });

                    })
                })
                .catch(function(error) {
                    const {
                        status
                    } = error.response
                    if (status === 401) {
                        localStorage.clear()
                        window.location.href = baseUrl + 'php/auth/login.php';
                    }
                    $('#record-not-found-div').css("display", "block")
                });

                function cancelButtonClick() {
                    // Redirect to the desired URL
                    window.location.href = baseUrl + '/php/case/view.php?cid=' + caseId;
                }
            
        
        
        const submitForm = () => {
            startLoader()

            // // Event listener for "Create Case" button click
            // $('#create-new-case1-button1').on('click', function() {
                // Use these values in your axios.post request

                let selectedCaseMembers = [];

                $('.client-checkbox').each(function () {
                    if ($(this).prop('checked')) {
                        // Get the values from the corresponding row
                        const row = $(this).closest('tr');
                        const id = row.find('td:eq(2)').text();
                        const role = row.find('td:eq(4)').text(); // Assuming role is in the 4th column

                        // Add the selected case member to the array
                        selectedCaseMembers.push({
                            case_member_id: id,
                            case_member_type: role,
                            case_member_role: 'role' // Assuming a default role for clients
                        });
                    }
                });

                $('.staff-checkbox').each(function () {
                    if ($(this).prop('checked')) {
                        // Get the values from the corresponding row
                        const row = $(this).closest('tr');
                        const id = row.find('td:eq(2)').text();
                        const role = row.find('td:eq(4)').text(); // Assuming role is in the 4th column

                        // Add the selected case member to the array
                        selectedCaseMembers.push({
                            case_member_id: id,
                            case_member_type: role,
                            case_member_role: 'role' // Assuming a default role for clients
                        });
                    }
                });


                axios.put('/api/cases/' + caseId, {
                    case_title: $('.create-new-case1-input-case-title').val(),
                    case_description: $('.create-new-case1-textarea').val(),
                    case_type: $('.create-new-case1-textinput').val(),
                    case_status: $('.create-new-case1-textinput1').val(),
                    case_priority: $('.create-new-case1-textinput2').val(),
                    case_total_billed_hour: parseInt($('.create-new-case1-textinput3').val(), 10),
                    case_member_list: selectedCaseMembers
                })
                .then(function(response) {
                    window.location.href = baseUrl + '/php/case/view.php?cid=' + caseId;
                    endLoader()
                })
                .catch(function(error) {
                    const { status } = error.response;
                    if (status === 401) {
                        localStorage.clear();
                        window.location.href = baseUrl + 'php/auth/login.php';
                    } else {
                        // alert(`Error: ${data.message}`);
                    }
                    endLoader()
                });
            // });
        };

        document.getElementById('createCase-Form').addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            if ($('.client-checkbox:checked').length === 0) {
                // If none is checked, prevent form submission or perform other actions
                alert('Please select at least one client.');
                return false; // Prevent form submission
            }

            if ($('.staff-checkbox:checked').length === 0) {
                // If none is checked, prevent form submission or perform other actions
                alert('Please select at least one staff.');
                return false; // Prevent form submission
            }

            submitForm();
        });
    
    </script>
</body>

</html>