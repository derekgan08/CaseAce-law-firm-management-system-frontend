<div class="navbar-bg">
    <!-- determine type of navbar to show here -->

    <div class="admin-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-logo"><img width="80" height="80" src="../../assets/CaseAceLogo.png" alt="home" /><br>CASEACE</li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-dashboard" href="http://localhost:3000/php/dashboard.php"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/home.png" alt="home" />Dashboard</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-client" href="http://localhost:3000/php/client"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/gender-neutral-user.png" alt="gender-neutral-user" />Client</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/toolbox.png" alt="toolbox" />Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/opened-folder.png" alt="opened-folder" />Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/tear-off-calendar.png" alt="tear-off-calendar" />Appointment</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-task" href="http://localhost:3000/php/task"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/assignment-turned-in.png" alt="assignment-turned-in" />Task</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-employee" href="http://localhost:3000/php/employee"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/employee-card.png" alt="employee-card" />Employee</a></li>
            <li class="navbar-v nb-notifications" onclick="startLoader()"><a class="nb-e nb-notification" href="http://localhost:3000/php/notification"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/alarm.png" alt="settings--v1" />Notifications</a></li>
            <li class="navbar-v nb-setting"><a class="nb-e nb-setting" onclick="getUserDetails_setting()" data-bs-toggle="modal" data-bs-target="#editSetting"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/settings--v1.png" alt="settings--v1" />Settings</a></li>
            <li class="navbar-v nb-logout" onclick="startLoader()"><a class="nb-e nb-logout" href="http://localhost:3000/php/auth/logout.php"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/exit.png" alt="settings--v1" />Logout</a></li>
        </ul>
    </div>
    <div class="paralegal-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-logo"><img width="80" height="80" src="../../assets/CaseAceLogo.png" alt="home" /><br>CASEACE</li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/toolbox.png" alt="toolbox" />Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/opened-folder.png" alt="opened-folder" />Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/tear-off-calendar.png" alt="tear-off-calendar" />Appointment</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-task" href="http://localhost:3000/php/task"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/assignment-turned-in.png" alt="assignment-turned-in" />Task</a></li>
            <li class="navbar-v nb-notifications" onclick="startLoader()"><a class="nb-e nb-notification" href="http://localhost:3000/php/notification"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/alarm.png" alt="settings--v1" />Notifications</a></li>
            <li class="navbar-v nb-setting"><a class="nb-e nb-setting" onclick="getUserDetails_setting()" data-bs-toggle="modal" data-bs-target="#editSetting"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/settings--v1.png" alt="settings--v1" />Settings</a></li>
            <li class="navbar-v nb-logout" onclick="startLoader()"><a class="nb-e nb-logout" href="http://localhost:3000/php/auth/logout.php"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/exit.png" alt="settings--v1" />Logout</a></li>
        </ul>
    </div>

    <div class="client-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-logo"><img width="80" height="80" src="../../assets/CaseAceLogo.png" alt="home" /><br>CASEACE</li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/toolbox.png" alt="toolbox" />Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/opened-folder.png" alt="opened-folder" />Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/tear-off-calendar.png" alt="tear-off-calendar" />Appointment</a></li>
            <li class="navbar-v nb-notifications" onclick="startLoader()"><a class="nb-e nb-notification" href="http://localhost:3000/php/notification"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/alarm.png" alt="settings--v1" />Notifications</a></li>
            <li class="navbar-v nb-setting"><a class="nb-e nb-setting" onclick="getUserDetails_setting()" data-bs-toggle="modal" data-bs-target="#editSetting"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/settings--v1.png" alt="settings--v1" />Settings</a></li>
            <li class="navbar-v nb-logout" onclick="startLoader()"><a class="nb-e nb-logout" href="http://localhost:3000/php/auth/logout.php"><img width="36" height="36" src="https://img.icons8.com/ios-glyphs/60/ffffff/exit.png" alt="settings--v1" />Logout</a></li>
        </ul>
    </div>
</div>
<div class="loader-div">
    <div class="loader">
        <div class="cell d-0"></div>
        <div class="cell d-1"></div>
        <div class="cell d-2"></div>

        <div class="cell d-1"></div>
        <div class="cell d-2"></div>


        <div class="cell d-2"></div>
        <div class="cell d-3"></div>


        <div class="cell d-3"></div>
        <div class="cell d-4"></div>
    </div>

</div>

<div class="modal" id="editSetting" tabindex="-1" aria-labelledby="editSettingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSettingLabel">Edit Personal Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-editDocument-popUpDialog2" class="form-uploadDocument-popUpDialog1">
                    <div class="form">
                        <div class="hoverable-img" style="background-color: #ffffff">
                            <div class="img-wrap">
                                <img src="" id="client-clientInfo-clientAvatar_setting" alt="" style="width: 10rem; height: 10rem; margin-left: auto;margin-right: auto;" />
                            </div>
                            <div class="middle-img-hover img-wrap">
                                <div class="view-text img-wrap">
                                </div>
                            </div>
                            <div class="file-input-div" style="border: 4px dashed #1c277e80; color: #1c277e80; width: calc(100% - 4rem); height: 10rem; top: 2rem; position: absolute; opacity: 0;">
                                <input type="file" id="client-clientEditInfo-clientAvatar_setting" multiple onchange="readURL(this)">
                                <p id="client-clientEditInfo-clientAvatar_setting-text">Drag your avatar here or click in this area.</p>
                            </div>
                        </div>
                        <p class="group">
                            <input id="client-clientEditInfo-clientName_setting" type="text" required>
                            <label for="client-clientEditInfo-clientName_setting">Name</label>
                        </p>
                        <p class="group">
                            <input id="client-clientEditInfo-clientEmail_setting" type="text" required>
                            <label for="client-clientEditInfo-clientEmail_setting">Email</label>
                        </p>

                        <p class="group">
                            <input id="client-clientEditInfo-clientNumber_setting" type="text" required>
                            <label for="client-clientEditInfo-clientNumber_setting">Contact Number</label>
                        </p>
                        <p class="group">
                            <input id="client-clientEditInfo-clientType_setting" type="text" required readonly>
                            <!-- <label for="client-clientEditInfo-clientType_setting">Type</label> -->
                        </p>
                        <p class="group">
                            <textarea id="client-clientEditInfo-clientAddress_setting" type="text" required></textarea>
                            <label for="client-clientEditInfo-clientAddress_setting">Address</label>
                        </p>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveBtnEditForm" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" onclick="confirmSave_setting()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    const userType = getUserType()

    if (userType === 'admin' || userType === 'partner') {
        $(".admin-navbar").css({
            "display": "block"
        });
        $("div.paralegal-navbar").css({
            "display": "none"
        });
        $("div.client-navbar").css({
            "display": "none"
        });
    } else if (userType === 'paralegal' || userType === 'associates') {
        $("div.admin-navbar").css({
            "display": "none"
        });
        $("div.paralegal-navbar").css({
            "display": "block"
        });
        $("div.client-navbar").css({
            "display": "none"
        });
    } else if (userType === 'client') {
        $("div.admin-navbar").css({
            "display": "none"
        });
        $("div.paralegal-navbar").css({
            "display": "none"
        });
        $("div.client-navbar").css({
            "display": "block"
        });
    } else {
        // localStorage.clear()
        // window.location.replace(baseUrl + 'php/auth/login.php');
    }

    const updateNavbarAttr = () => {
        const currentLink = window.location.href;
        $('.nb-e').removeClass('active');
        if (currentLink.includes("dashboard"))
            $('.nb-dashboard').addClass('active');
        else if (currentLink.includes("client"))
            $('.nb-client').addClass('active');
        else if (currentLink.includes("case"))
            $('.nb-case').addClass('active');
        else if (currentLink.includes("document"))
            $('.nb-document').addClass('active');
        else if (currentLink.includes("appointment"))
            $('.nb-appointment').addClass('active');
        else if (currentLink.includes("task"))
            $('.nb-task').addClass('active');
        else if (currentLink.includes("employee"))
            $('.nb-employee').addClass('active');
        else if (currentLink.includes("setting"))
            $('.nb-setting').addClass('active');
        else if (currentLink.includes("notification"))
            $('.nb-notification').addClass('active');
    }

    const getUserDetails_setting = () => {
        axios.get(`/api/crm/self`, )
            .then(function(response) {
                const {
                    username,
                    related_case_history,
                    email,
                    number,
                    address,
                    avatar_url,
                    type,
                    password,
                } = response.data;

                $('#client-clientInfo-clientName').text(username)
                $('#client-clientEditInfo-clientName_setting').val(username)

                // $('#client-clientInfo-clientHistory').text(related_case_history)
                // $('#client-clientEditInfo-clientHistory').val(related_case_history)

                $('#client-clientInfo-clientEmail').text(email)
                $('#client-clientEditInfo-clientEmail_setting').val(email)

                $('#client-clientInfo-clientNumber').text(number)
                $('#client-clientEditInfo-clientNumber_setting').val(number)

                $('#client-clientInfo-clientAddress').text(address)
                $('#client-clientEditInfo-clientAddress_setting').val(address)


                $('#client-clientInfo-nextDate').text()
                const uploadedByUserInfo = ""
                $('#client-clientInfo-lastDate').text()

                $('#client-clientInfo-clientAvatar_setting').attr("src", avatar_url)
                $('#client-clientEditInfo-clientAvatar_setting').attr("src", avatar_url)

                $('#client-clientEditInfo-clientType_setting').val(type)
                $('#client-clientInfo-clientType').text(type)

                $('#client-clientEditInfo-clientPassword').val(password)
                $('#client-clientInfo-clientPassword').text(password)

                $('#client-icon-delete').css("display", "block")
                $('#client-icon-edit').css("display", "block")

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


    }

    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#client-clientInfo-clientAvatar_setting").setAttribute("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    const editUser_setting = () => {
        $('#client-icon-save').css("display", "block")
        $('#client-icon-cancel').css("display", "block")
        $('#client-icon-editAccess').css("display", "inline")
        $('#client-icon-delete').css("display", "none")
        $('#client-icon-edit').css("display", "none")

        $('#client-clientEditInfo-clientType_setting').css("display", "block")
        $('#client-clientEditInfo-clientEmail_setting').css("display", "block")
        $('#client-clientEditInfo-clientName_setting').css("display", "block")
        $('#client-clientEditInfo-clientNumber_setting').css("display", "block")
        $('#client-clientEditInfo-clientAddress_setting').css("display", "block")
        $('#client-clientEditInfo-clientHistory').css("display", "block")
        $('#client-clientEditInfo-clientAvatar_setting').css("display", "block")
        $('#client-clientEditInfo-clientPassword').css("display", "block")
        $('#client-clientEditInfo-clientAvatar_setting').css("display", "block")
        $('#document-documentInfo-documentIFrameWrap').css("display", "block")

        $('#client-clientInfo-clientType').css("display", "none")
        $('#client-clientInfo-clientEmail').css("display", "none")
        $('#client-clientInfo-clientName').css("display", "none")
        $('#client-clientInfo-clientNumber').css("display", "none")
        $('#client-clientInfo-clientAddress').css("display", "none")
        $('#client-clientInfo-clientHistory').css("display", "none")
        $('#client-clientInfo-clientPassword').css("display", "none")
    }

    // Send update request to server if requested
    const sendUpdateRequest_setting = () => {
        $('#saveBtnEditForm').html('<img width="20" heigjt="20" src="../../../assets/loading.gif">')
        $('#saveBtnEditForm').prop('disabled', true);

        var formData = new FormData()
        formData.append("username", $('#client-clientEditInfo-clientName_setting').val())
        formData.append("email", $('#client-clientEditInfo-clientEmail_setting').val())
        formData.append("type", $('#client-clientEditInfo-clientType_setting').val())
        formData.append("number", $('#client-clientEditInfo-clientNumber_setting').val())
        formData.append("address", $('#client-clientEditInfo-clientAddress_setting').val())
        formData.append("password", $('#client-clientEditInfo-clientPassword').val())
        formData.append("avatar_url", document.querySelector("#client-clientEditInfo-clientAvatar_setting").files[0])

        const reqBody = {
            username: $('#client-clientEditInfo-clientName_setting').val(),
            email: $('#client-clientEditInfo-clientEmail_setting').val(),
            type: $('#client-clientEditInfo-clientType_setting').val(),
            number: $('#client-clientEditInfo-clientNumber_setting').val(),
            address: $('#client-clientEditInfo-clientAddress_setting').val(),
            password: $('#client-clientEditInfo-clientPassword').val(),
            avatar_url: document.querySelector("#client-clientEditInfo-clientAvatar_setting").files[0],
        }

        let axiosupdateLink = document.querySelector("#client-clientEditInfo-clientAvatar_setting").files[0] ?
            "/api/crm/u/self" : "/api/crm/self"

        if (document.querySelector("#client-clientEditInfo-clientAvatar_setting").files[0]) {
            axios.put(axiosupdateLink, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                if (response.status === 200) {
                    location.reload()
                }

            }).catch(function(error) {

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
        } else {
            axios.put(axiosupdateLink, reqBody).then(function(response) {

                if (response.status === 200) {
                    location.reload()
                }

            }).catch(function(error) {

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
        }

    }

    // change the display properties when clicked cancel
    const cancelSave_setting = () => {
        $('#client-icon-save').css("display", "none")
        $('#client-icon-cancel').css("display", "none")
        $('#client-icon-delete').css("display", "block")
        $('#client-icon-edit').css("display", "block")

        $('#client-clientEditInfo-clientType_setting').css("display", "none")
        $('#client-clientEditInfo-clientHistory').css("display", "none")
        $('#client-clientEditInfo-clientName_setting').css("display", "none")
        $('#client-clientEditInfo-clientNumber_setting').css("display", "none")
        $('#client-clientEditInfo-clientAddress_setting').css("display", "none")
        $('#client-clientEditInfo-clientEmail_setting').css("display", "none")
        $('#client-clientEditInfo-clientAvatar_setting').css("display", "none")
        $('#client-clientEditInfo-clientPassword').css("display", "none")
        $('#client-clientEditInfo-clientAvatar_setting').css("display", "none")
        $('#document-documentInfo-documentIFrameWrap').css("display", "none")

        $('#client-clientInfo-clientHistory').css("display", "block")
        $('#client-clientInfo-clientName').css("display", "block")
        $('#client-clientInfo-clientNumber').css("display", "block")
        $('#client-clientInfo-clientAddress').css("display", "block")
        $('#client-clientInfo-clientEmail').css("display", "block")
        $('#client-clientInfo-clientType').css("display", "block")
        $('#client-clientInfo-clientAvatar_setting').css("display", "block")
        $('#client-clientInfo-clientPassword').css("display", "block")
    }

    // Send update request if update button is clicked
    const confirmSave_setting = () => {
        sendUpdateRequest_setting()
    }

    updateNavbarAttr();
</script>