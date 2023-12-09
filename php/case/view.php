<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js" integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous"></script>

    <title>Cases</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<style>
  .common-pfp-style {
    width: 30px;
    height: 30px;
    object-fit: cover;
    border-radius: 50%
  }
</style>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h1-main-title">Case Details</h1>
            <div class = "buttons"> 
                <a class="btn btn-primary" id="delete-case-button" style="background-color: #1c277e; margin-right: 5px; font-family: 'Montserrat', sans-serif;">Delete This Case</a>
                <a class="btn btn-primary" id="create-case-button" style="background-color: #1c277e; font-family: 'Montserrat', sans-serif;">Edit This Case</a>
            </div>
        </div>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 85vh;">
                <link href="./css/case/styles.css" rel="stylesheet" />
                    <!-- <div class="case-details-container"> -->
                        <!-- <div class="case-details-container1"> -->
                        <h3 class="h3-semibold-24">
                            Case Info
                        </h3>
                        <div class="case-details-case-info1">
                            <div class="case-details-container2">
                            <span class="case-details-case-title"></span>
                            <span class="case-details-case-title1"></span>
                            <div class="case-details-container3">
                                <div class="case-details-container4">
                                <span class="case-details-case-type"></span>
                                <span class="case-details-case-type1"></span>
                                </div>
                                <div class="case-details-container5">
                                <span class="case-details-case-status"></span>
                                <span class="case-details-case-status1"></span>
                                </div>
                                <div class="case-details-container6">
                                <span class="case-details-priority"></span>
                                <span class="case-details-priority1"></span>
                                </div>
                                <div class="case-details-container7">
                                <span class="case-details-total-billed-hour"></span>
                                <span class="case-details-total-billed-hour1"></span>
                                </div>
                            </div>
                            <span class="case-details-case-description"></span>
                            <span class="case-details-case-description1">
                            </span>
                            </div>
                            <div class="case-details-container8">
                            <div class="case-details-client-involved">
                                <div class="case-details-client-involved1">
                                <span class="case-details-client-involved2">Client Involved</span>
                                <div class="case-details-client-0">
                                    <img alt=" " id="case-client-image0" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-client-name0"></span>
                                </div>
                                <div class="case-details-client-1">
                                    <img alt=" " id="case-client-image1" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-client-name1"></span>
                                </div>
                                <div class="case-details-client-2">
                                    <img alt=" " id="case-client-image2" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-client-name2"></span>
                                </div>
                                </div>
                            </div>
                            <div class="case-details-staff-involved">
                                <div class="case-details-staff-involved1">
                                <span class="case-details-staff-involved2">Staff Involved</span>
                                <div class="case-details-client-11">
                                    <img alt=" " id="case-member-image0" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-member-name0"></span>
                                </div>
                                <div class="case-details-client-21">
                                    <img alt=" " id="case-member-image1" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-member-name1"></span>
                                </div>
                                <div class="case-details-client-31">
                                    <img alt=" " id="case-member-image2" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; visibility: hidden;"/>
                                    <span class="case-member-name2"></span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    
                        <h3 class="h3-semibold-24 non-float-card" style="margin-top: 4rem;">
                            All Documents
                            <button style="float: right;margin-right: 1rem; background-color: #1c277e;" data-bs-toggle="modal" data-bs-target="#uploadDocumentModal" type="button" class="btn btn-primary">
                                <img width="18" height="18" style="margin-right: 1rem;" src="https://img.icons8.com/ios-glyphs/60/ffffff/xbox-cross.png" alt="xbox-cross" />
                                Add Document
                            </button>
                        </h3>
                        <div class="table-section" style="height: 48%; width: 100%;overflow-y: auto;">
                            <table id="document-allDocument-table" class="table-general">
                                <thead>
                                    <tr>
                                        <th class="col-2">Name </th>
                                        <th class="col-1">Type </th>
                                        <th class="col-1">File Size </th>
                                        <th class="col-2">Uploaded By </th>
                                        <th class="col-2">Updated Date </th>
                                        <th class="col-2">Last Accessed </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
            
                        </div>
                </div>
            </div>
            <div class="col-4 row-1" style="">
                <!-- Overall Analytics for Documents -->
                <div class="float-card row-only-one-col" style="min-height: 85vh; display: flex; flex-direction: column;">
                    <h3 class="h3-semibold-24">Case Messages</h3>
                    <div id="case-caseMessages-div" style="height: 90%; overflow: auto;">
                        <ul class="chat-thread" id="chat-thread">

                        </ul>
                    </div>

                    <div style="display: inline-block; align-self: flex-end; width: 100%;">
                        <form id="chat-form">

                            <input class="chat-window-message" id="message" type="text" autocomplete="off" autofocus />
                            <button type="submit" class="chat-form-btn-send"><img style="width: 1.8rem; height: 1.8rem;" class="chat-form-btn-send" src="https://img.icons8.com/ios-glyphs/60/filled-sent.png" alt="filled-sent" /></button>

                            <div class="btn-group dropup">
                                <button type="button" class="chat-form-btn-more btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="width: 1.8rem; height: 1.8rem;" class="chat-form-btn-more" src="https://img.icons8.com/ios-glyphs/60/add.png" alt="add" /></button>
                                <div class="dropdown-menu" style="padding: 0.5rem;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestDocumentModal">
                                        Request Document
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="requestDocumentModal" tabindex="-1" aria-labelledby="requestDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="requestDocumentModalLabel">Request Document</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-uploadDocument-popUpDialog" class="form-uploadDocument-popUpDialog1">
                        <div class="form">
                            <p class="group">
                                <input id="input-documentTitle" type="text" required>
                                <label for="input-documentTitle">Document Title</label>
                            </p>
                            <p class="group">
                                <input id="input-documentType" type="text" required type="text" list="documentTypeList-req" oninput="suggestDocumentTypes('request')">
                                <label for="input-documentType">Document Type</label>
                                <datalist id="documentTypeList-req">
                                    <!-- Options will be dynamically populated here -->
                                </datalist>
                            </p>
                            <p class="group">
                                <textarea id="input-documentDesc" type="text" required></textarea>
                                <label for="input-documentDesc">Document Description</label>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" form="form-uploadDocument-popUpDialog">Request</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="uploadDocumentModal" tabindex="-1" aria-labelledby="uploadDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="uploadDocumentModalLabel">Upload New Document</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-uploadDocument-popUpDialog2" class="form-uploadDocument-popUpDialog1">
                        <div class="form">
                            <p class="group">
                                <input id="input-documentTitle" type="text" required>
                                <label for="input-documentTitle">Document Title</label>
                            </p>
                            <p class="group">
                                <input id="input-documentType" type="text" list="documentTypeList-upl" oninput="suggestDocumentTypes('upload')" required>
                                <datalist id="documentTypeList-upl">
                                    <!-- Options will be dynamically populated here -->
                                </datalist>
                                <!-- <select id="input-documentType" onchange="populateSecondaryOptions()">
                                    <option value="" disabled selected>Select a Document Type</option>
                                    <option value="individuals">Individuals</option>
                                    <option value="legal">Legal Documents</option>
                                    <option value="business">Business Documents</option>
                                    <option value="education">Educational Documents</option>
                                    <option value="realEstate">Real Estate Documents</option>
                                    <option value="medical">Medical Documents</option>
                                    <option value="technology">Technology and IT Documents</option>
                                </select> -->
                                <label for="input-documentType">Document Type</label>
                            </p>
                            <p class="group">
                                <textarea id="input-documentDesc" type="text" required></textarea>
                                <label for="input-documentDesc">Document Description</label>
                            </p>
                            <div class="file-input-div">
                                <input type="file" id="exampleFileUpload" multiple>
                                <p id="exampleFileUploadText">Drag your files here or click in this area.</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" onclick="uploadNewDocument()">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        if(getUserType() !== 'admin' && getUserType() !== 'partner') $('#delete-case-button').css("display", "none")
        if(getUserType() !== 'admin' && getUserType() !== 'partner' && getUserType() !== 'associates') $('#create-case-button').css("display", "none")
        // Chart options to be shown later
        var caseOption = {
            series: [44, 20, 30],
            fill: {
                colors: ['#1A73E8', '#B32824', '#A42824']
            },
            labels: ["open", "closed", "pending"],
            distributed: true,
            borderWidth: 0,
            chart: {
                width: 380,
                type: 'donut',
            },
            dataLabels: {
                enabled: true
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true
                    }
                }
            }],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%', // Adjust the size of the donut
                    },
                    customScale: 1, // Adjust the scale to remove the white borders
                    offsetX: 0,
                    offsetY: 0,

                },
            },
            stroke: {
                show: false,
            },
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
            }
        };

        // Display filename when file is uploaded
        $(document).ready(function() {
            $('#exampleFileUpload').change(function() {
                var filename = $('#exampleFileUpload').val().split('\\').pop();
                $('#exampleFileUploadText').text(filename);
            });
        });

        // Thhis ii is to keep track of new unique id of current message sent, including requestDoc message
        let ii = 0;

        // Get parameters and correct elements
        const urlParams = new URLSearchParams(window.location.search);
        const caseId = urlParams.get('cid');
        const username = localStorage.getItem('name')
        const token = localStorage.getItem('authToken');
        let form = document.getElementById('chat-form');
        let myname = document.getElementById('myname');
        let message = document.getElementById('message');
        let messageArea = document.getElementById('messageArea');
        let chatThreads = document.getElementById('chat-thread');
        let chatDiv = document.getElementById('case-caseMessages-div');
        let requestDocForm = document.getElementById('form-uploadDocument-popUpDialog');
        let documentTitle = document.getElementById('input-documentTitle');
        let documentType = document.getElementById('input-documentType');
        let documentDesc = document.getElementById('input-documentDesc');

        console.log(caseId);

        // get today date
        var todayDate = new Date()
        var todayDateStr = (todayDate.getMonth() + 1) + '/' + todayDate.getDate() + '/' + todayDate.getFullYear()

        document.getElementById('delete-case-button').addEventListener('click', function() { 

            // Send a DELETE request to the server using Axios
            axios.delete(`/api/cases/${caseId}`)
                .then(function(response) {
                    // Handle success, e.g., show a success message or redirect to another page
                    console.log(response.data); // Log the response from the server
                    alert('Case deleted successfully');
                    // You can also redirect the user to another page if needed
                    window.location.href = baseUrl + 'php/case/';
                })
                .catch(function(error) {
                    // Handle errors, e.g., show an error message to the user
                    console.error(error);
                    alert('Error deleting case');
                });

        });
        
        document.getElementById('create-case-button').href = baseUrl + 'php/case/editCase.php?cid=' + caseId;

        axios.get('/api/cases/' + caseId, )
            .then(function(response) {
                
                const caseData = response.data
                if(caseData.length===0) 
                    $('#record-not-found-div').css("display", "block")
                else 
                    $('#record-not-found-div').css("display", "none")


                document.querySelector('.case-details-case-title').textContent = 'Case Title';
                document.querySelector('.case-details-case-title1').textContent = caseData.case_title;
                document.querySelector('.case-details-case-description').textContent = 'Case Description';
                document.querySelector('.case-details-case-description1').textContent = caseData.case_description;
                document.querySelector('.case-details-case-type').textContent = 'Case Type';
                document.querySelector('.case-details-case-type1').textContent = caseData.case_type;
                document.querySelector('.case-details-case-status').textContent = 'Case Status';
                document.querySelector('.case-details-case-status1').textContent = caseData.case_status;
                document.querySelector('.case-details-priority').textContent = 'Priority';
                document.querySelector('.case-details-priority1').textContent = caseData.case_priority;
                document.querySelector('.case-details-total-billed-hour').textContent = 'Total Billed Hour';
                document.querySelector('.case-details-total-billed-hour1').textContent = caseData.case_total_billed_hour;

                // document.querySelector('.case-client-name0').textContent = caseData.case_client_list[0].case_member_id;

                const caseClientList = caseData.case_member_list.filter(user => user.case_member_type === 'client');

                const caseStaffList = caseData.case_member_list.filter(user => user.case_member_type !== 'client');

                console.log(caseClientList);

                for (let i = 0; i < caseClientList.length; i++) {
                    axios.get('/api/crm/' + caseClientList[i].case_member_id, )
                    .then(function(response) {
                        const avatar_url = response.data.avatar_url;
                        if(avatar_url === ""){
                            document.getElementById(`case-client-image${i}`).src = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                            document.getElementById(`case-client-image${i}`).style.visibility = "visible";
                        } else {
                            document.getElementById(`case-client-image${i}`).src = response.data.avatar_url;
                            document.getElementById(`case-client-image${i}`).style.visibility = "visible";
                        }


                        document.querySelector(`.case-client-name${i}`).textContent = response.data.username;
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
                }

                for (let i = 0; i < caseStaffList.length; i++) {
                    axios.get('/api/crm/' + caseStaffList[i].case_member_id, )
                    .then(function(response) {
                        const avatar_url = response.data.avatar_url;
                        if(avatar_url === ""){
                            document.getElementById(`case-member-image${i}`).src = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                            document.getElementById(`case-member-image${i}`).style.visibility = "visible";
                        } else {                            
                            document.getElementById(`case-member-image${i}`).src = response.data.avatar_url;
                            document.getElementById(`case-member-image${i}`).style.visibility = "visible";
                        }


                        document.querySelector(`.case-member-name${i}`).textContent = response.data.username;
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
                }

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
        


        // Get all mssages in this selected case
        axios.get(`/api/cases/${caseId}/message`, )
            .then(function(response) {

                // Process and determine which type of styles for each message get
                /**
                 * Message types: 
                 *      other people normal message, 
                 *      other people requestDoc message,
                 *      current user normal message, 
                 *      current user requestDoc message,
                 */
                response.data.message_list.forEach((msg, i) => {

                    // Calculate display date and time in message box
                    var dataDate = new Date(parseInt(msg.message_sent_date));
                    var fdataDate = (dataDate.getMonth() + 1) + '/' + dataDate.getDate() + '/' + dataDate.getFullYear()
                    var dateStr = "";

                    if (fdataDate == todayDateStr) {
                        dateStr = ` <p class="timestamp">${dataDate.getHours() < 10 ? '0'+ dataDate.getHours() : dataDate.getHours()}:${dataDate.getMinutes()<10? '0'+dataDate.getMinutes() : dataDate.getMinutes()}</p>`
                    } else {
                        dateStr = ` <p class="timestamp">${(dataDate.getDate())}/${dataDate.getMonth()+1} ${dataDate.getHours()}:${dataDate.getMinutes()}</p>`
                    }

                    // determine css whether this is current user sent or other people sent message
                    let msgThreadLi = document.createElement('li');
                    if (msg.message_sender_name === username) {
                        msgThreadLi.classList.add('self');
                    } else {
                        msgThreadLi.classList.add('other-people');
                    }

                    let correctMessageAccordingToType;

                    // determine the css of message type, normal message or requestDoc message
                    if (msg.message_type === "message") {
                        correctMessageAccordingToType = msg.message
                    } else if (msg.message_type === "request" || msg.message_type === "requested_and_uploaded") {
                        // in here, we need to check again whether the doc requested is uploaded? -> should show 'tick' image instead of 'important' image.

                        const splittedRequest = msg.message.split(";;")
                        let reqDocTitle = splittedRequest[0]
                        let reqDocType = splittedRequest[1]
                        let reqDocDesc = splittedRequest[2]

                        const htmlToDisplay = msg.message_type === "request" ? `
                        <button type="button" style="background: none; border:none; display:block; margin-left: auto; margin-right: auto;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestDocumentModal-${i}">
                                        <img style="width: 5.625rem; height: 5.625rem;" src="https://img.icons8.com/ios-glyphs/90/1c277e/high-importance.png" alt="high-importance"/>
                                        </button><p style="margin-bottom: 0;font-size: 12px;font-style: italic;color: black;">${msg.message_sender_name} is requesting..</p>
                                    ` : `
                        <button type="button" style="background: none; border:none; display:block; margin-left: auto; margin-right: auto;" class="btn btn-primary" data-bs-toggle="modal" disabled data-bs-target="#requestDocumentModal-${i}">
                        <img style="width: 5.625rem; height: 5.625rem;" src="https://img.icons8.com/ios-glyphs/90/1c277e/ok--v1.png" alt="ok"/>
                                    </button><p style="margin-bottom: 0;font-size: 12px;font-style: italic;color: black; font-weight: 300;">Document is uploaded</p>`

                        let newModal = `
                        <div class="modal" id="requestDocumentModal-${i}" tabindex="-1" aria-labelledby="requestDocumentModal-${i}Label" aria-hidden="false">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="requestDocumentModal-${i}Label">Request Document</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-uploadDocument-popUpDialog1" id="form-uploadDocument-popUpDialog1-${i}" enctype="multipart/form-data">
                                            <div class="form">
                                            <input id="input-documentId" type="text" readonly hidden value="${msg._id}">
                                            
                                                <p class="group">
                                                    <input id="input-documentTitle" type="text" readonly value="${reqDocTitle}">
                                                    <label class="entered"  for="input-documentTitle">Document Title</label>
                                                </p>
                                                <p class="group">
                                                    <input id="input-documentType" type="text"  readonly value="${reqDocType}">
                                                    <label class="entered"  for="input-documentType">Document Type</label>
                                                </p>
                                                <p class="group">
                                                    <textarea id="input-documentDesc" type="text" readonly>${reqDocDesc}</textarea>
                                                    <label class="entered"  for="input-documentDesc">Document Description</label>
                                                </p>
                                            `

                        if (msg.message_sender_name !== username) {
                            const newModalFileToUpload = `
                            <div class="file-input-div">
                                <input type="file" id="exampleFileUpload-${i}" class="exampleFileUpload" onchange="updateFileNameUploaded(${i})">
                                <p class="exampleFileUploadText" id="exampleFileUploadText-${i}">Drag your files here or click in this area.</p>
                            </div>`;

                            newModal += newModalFileToUpload
                        }
                        let newModal2;
                        if (msg.message_sender_name !== username) {

                            newModal2 = `</div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" form="form-uploadDocument-popUpDialog1-${i}" onclick="uploadRequestedDocument(${i})">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        } else {
                            newModal2 = `</div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        }

                        // this ii is ue here so that the user can view the details without needing to refresh the page
                        ii = i;
                        newModal += newModal2

                        correctMessageAccordingToType = htmlToDisplay
                        $("body").append(newModal);
                    }
                    msgThreadLi.innerHTML = `<p class="sender-name">${msg.message_sender_name}</p> ${correctMessageAccordingToType} ${dateStr}`;

                    chatThreads.appendChild(msgThreadLi);
                });

                // scroll to bottom of case messages
                chatDiv.scrollTop = chatDiv.scrollHeight;
            })
            .catch(function(error) {

                if (error.response.status === 401) {
                    launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                    setTimeout(function() {
                        localStorage.clear()
                        window.location.href = baseUrl + 'php/auth/login.php';
                    }, 1000);
                } else {
                    // launchErrorModal(error.response.data.message)
                }
            });

        // Render chart of case analysis
        renderChart('document-documentInfo-chart', caseOption)
        renderChart('document-documentStatus-chart', caseOption)

        // Get all documents in a case
        axios.get('/api/documents/all/' + caseId, )
            .then(function(response) {
                // TODO: Convert into data and render it
                const documentData = response.data
                // Transform into rows of documents
                documentData.forEach(doc => {
                    // Process data to human readable ways, including the filesize, the date and etc
                    const docName = `${doc.doc_title}`
                    const uploadedDate = new Date(parseInt(doc.uploaded_at))
                    const formatedUploadedDate = `${uploadedDate.getDate()}, ${monthNames[uploadedDate.getMonth()]} ${uploadedDate.getFullYear()}`
                    const uploadedByUserAvatarImg =
                        doc.uploadedByUserName.avatar_url !== "" &&
                        doc.uploadedByUserName.avatar_url &&
                        doc.uploadedByUserName.avatar_url !== "undefined" ?
                        doc.uploadedByUserName.avatar_url :
                        "https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png"

                    const accessedByUserAvatarImg =
                        doc.lastAccessedByUserName.avatar_url !== "" &&
                        doc.lastAccessedByUserName.avatar_url &&
                        doc.lastAccessedByUserName.avatar_url !== "undefined" ?
                        doc.lastAccessedByUserName.avatar_url :
                        "https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png"


                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/document/view.php?id=' + doc._id + '&cid=' + doc.doc_case_related + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />' + docName + '</a></td>' +
                        '<td>' + doc.doc_type + '</td>' +
                        '<td>' + formatFileSize(doc.filesize) + '</td>' +
                        `<td><img width="20" height="20" src="${uploadedByUserAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + doc.uploadedByUserName.username + '</td>' +
                        '<td>' + formatedUploadedDate + '</td>' +
                        `<td><img width="20" height="20" src="${accessedByUserAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + doc.lastAccessedByUserName.username + '</td>' +
                        '</tr>';

                    $('#document-allDocument-table tbody').append(markup);
                });

                // allow the table can be sorted
                $('#document-allDocument-table').tableSort({
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
                    // launchErrorModal(error.response.data.message)
                }
            });

        endLoader();

        const updateFileNameUploaded = (idNum) => {
            var filename = $(`#exampleFileUpload-${idNum}`).val().split('\\').pop();
            $(`#exampleFileUploadText-${idNum}`).text(filename);
        }

        // Form action for uploading requested document
        const uploadRequestedDocument = (idNum) => {
            // Get element values to post to server
            startLoader()
            const formId = `#form-uploadDocument-popUpDialog1-${idNum}`;
            const reqDocTitle = $(formId + " #input-documentTitle").val()
            const reqDocType = $(formId + " #input-documentType").val()
            const reqDocDesc = $(formId + " #input-documentDesc").val()
            const reqDocMsgId = $(formId + " #input-documentId").val()
            const reqDocFile = document.querySelector(formId + ` #exampleFileUpload-${idNum}`).files[0] //$(formId + ` #exampleFileUpload-${idNum}`).files[0]

            // need to use formData to append file uploaded
            var formData = new FormData()
            formData.append("docUpload", reqDocFile)
            formData.append("doc_type", reqDocType)
            formData.append("filesize", reqDocFile.size)
            formData.append("doc_title", reqDocTitle)
            formData.append("req_msg_id", reqDocMsgId)
            formData.append("doc_case_related", caseId)
            formData.append("doc_description", reqDocDesc)
            axios.post('/api/documents', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    // after uploaded, reload the windows
                    location.reload()
                    endLoader()
                })
                .catch(function(error) {

                    if (error.response.status === 401) {
                        launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                        setTimeout(function() {
                            localStorage.clear()
                            window.location.href = baseUrl + 'php/auth/login.php';
                        }, 1000);
                    } else {
                        // launchErrorModal(error.response.data.message)
                    }
                });
        }

        const documentTypes = {
            individuals: ['Passport', 'Driver\'s License', 'National ID Card', 'Bank Statements', 'Tax Returns', 'Pay Stubs', 'Birth Certificate', 'Marriage Certificate', 'Divorce Decree', 'Medical History', 'Health Insurance Documents'],
            legal: ['Employment Contracts', 'Rental Agreements', 'Sales Contracts', 'Lawsuits', 'Legal Briefs', 'Court Orders', 'Patents', 'Trademarks', 'Copyrights', 'Letters of Agreement', 'Legal Notices'],
            business: ['Financial Statements', 'Invoices', 'Receipts', 'Partnership Agreements', 'Vendor Contracts', 'Client Agreements', 'Articles of Incorporation', 'Bylaws', 'Meeting Minutes', 'Employee Handbook', 'Job Descriptions', 'Performance Reviews'],
            education: ['Transcripts', 'Diplomas', 'Certificates', 'Enrollment Contracts', 'Student Agreements', 'Research Proposals'],
            realEstate: ['Deeds', 'Mortgages', 'Lease Agreements', 'Property Surveys', 'Title Documents', 'Homeowners Association (HOA) Documents'],
            medical: ['Medical Charts', 'Prescriptions', 'Lab Reports', 'Informed Consent Forms', 'Healthcare Directives', 'Medical Power of Attorney'],
            technology: ['End User License Agreements (EULAs)', 'Service Level Agreements (SLAs)', 'User Manuals', 'Technical Specifications', 'System Documentation']
        };

        function suggestDocumentTypes(type) {
            let currentFormId = ""
            let datalistElement;
            switch (type) {
                case "upload": {
                    currentFormId = "#form-uploadDocument-popUpDialog2"
                    datalistElement = $(currentFormId + " #documentTypeList-upl")
                    break;
                }
                case "request": {
                    currentFormId = "#form-uploadDocument-popUpDialog"
                    datalistElement = $(currentFormId + " #documentTypeList-req")
                    break;
                }
            }
            const inputElement = $(currentFormId + " #input-documentType").val()
            const inputValue = inputElement.toLowerCase();

            // Clear previous options
            datalistElement.html("");
            const relevantList = []

            // Populate options based on the input value
            for (const category in documentTypes) {
                documentTypes[category].forEach(option => {
                    if (option.toLowerCase().includes(inputValue) && !relevantList.includes(option)) {
                        relevantList.push(option)
                        const optionElement = document.createElement('option');
                        optionElement.value = option;
                        datalistElement.append(optionElement);
                    }
                });
            }
        }

        // Form action for uploading new document
        const uploadNewDocument = () => {
            // Get element values to post to server
            startLoader()
            const formId = `#form-uploadDocument-popUpDialog2`;
            const reqDocTitle = $(formId + " #input-documentTitle").val()
            const reqDocType = $(formId + " #input-documentType").val()
            const reqDocDesc = $(formId + " #input-documentDesc").val()
            const reqDocMsgId = $(formId + " #input-documentId").val()
            const reqDocFile = document.querySelector(formId + ` #exampleFileUpload`).files[0]

            // need to use formData to append file uploaded
            var formData = new FormData()
            formData.append("docUpload", reqDocFile)
            formData.append("doc_type", reqDocType)
            formData.append("filesize", reqDocFile.size)
            formData.append("doc_title", reqDocTitle)
            formData.append("req_msg_id", reqDocMsgId)
            formData.append("doc_case_related", caseId)
            formData.append("doc_description", reqDocDesc)
            axios.post('/api/documents', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    location.reload()
                    endLoader()
                })
                .catch(function(error) {

                    if (error.response.status === 401) {
                        launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                        setTimeout(function() {
                            localStorage.clear()
                            window.location.href = baseUrl + 'php/auth/login.php';
                        }, 1000);
                    } else {
                        // launchErrorModal(error.response.data.message)
                    }
                });
        }
    </script>
    <script>
        // Socket.io used for real-time messaging in case
        let socket = io("http://localhost:6500", {
            withCredentials: true,
            extraHeaders: {
                "my-custom-header": "abcd"
            },
            query: {
                token
            },
        });

        // Join a room when entering a case
        socket.emit('joinRoom', caseId);

        // Send message to backend when sent a msg
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if (message.value) {
                // Send a chat message
                socket.emit('chatMessage', {
                    caseId,
                    sent_date: new Date(),
                    user: username,
                    type: "message",
                    message: message.value,
                });
                message.value = '';
            }
        });

        // Send RequestDoc message to backend
        // The message is formatted so that it can be recognized as requestDoc msg in backend and frontend
        requestDocForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Send a chat message
            socket.emit('chatMessage', {
                caseId,
                sent_date: new Date(),
                user: username,
                type: "request",
                message: `${documentTitle.value};;${documentType.value};;${documentDesc.value}`
            });
            $('#requestDocumentModal').modal('hide')

            documentTitle.value = '';
            documentType.value = '';
            documentDesc.value = '';
        });

        // Receive chat messages
        socket.on('message', (data) => {
            ii++;
            var dataDate = new Date(data.sent_date)
            var fdataDate = (dataDate.getMonth() + 1) + '/' + dataDate.getDate() + '/' + dataDate.getFullYear()

            var dateStr = "";
            // process date to show
            if (fdataDate == todayDateStr) {
                dateStr = ` <p class="timestamp">${dataDate.getHours()}:${dataDate.getMinutes()}</p>`
            } else {
                dateStr = ` <p class="timestamp">${(dataDate.getDate())}/${dataDate.getMonth()+1} ${dataDate.getHours()}:${dataDate.getMinutes()}</p>`
            }
            let msgThreadLi = document.createElement('li');
            if (data.user === username) {
                msgThreadLi.classList.add('self');
            } else {
                msgThreadLi.classList.add('other-people');
            }


            let correctMessageAccordingToType;
            if (data.type === "message") {
                correctMessageAccordingToType = data.message
            } else if (data.type === "request" || data.type === "requested_and_uploaded") {
                const splittedRequest = data.message.split(";;")
                let reqDocTitle = splittedRequest[0]
                let reqDocType = splittedRequest[1]
                let reqDocDesc = splittedRequest[2]

                const htmlToDisplay = data.type === "request" ? `
                        <button type="button" style="background: none; border:none; display:block; margin-left: auto; margin-right: auto;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestDocumentModal-${ii}">
                                        <img style="width: 5.625rem; height: 5.625rem;" src="https://img.icons8.com/ios-glyphs/90/1c277e/high-importance.png" alt="high-importance"/>
                                        </button><p style="margin-bottom: 0;font-size: 12px;font-style: italic;color: black;">${data.user} is requesting..</p>
                                    ` : `
                        <button type="button" style="background: none; border:none; display:block; margin-left: auto; margin-right: auto;" class="btn btn-primary" data-bs-toggle="modal" disabled data-bs-target="#requestDocumentModal-${ii}">
                        <img style="width: 5.625rem; height: 5.625rem;" src="https://img.icons8.com/ios-glyphs/90/1c277e/ok--v1.png" alt="ok"/>
                                    </button><p style="margin-bottom: 0;font-size: 12px;font-style: italic;color: black; font-weight: 300;">Document is uploaded</p>`

                let newModal = `
                        <div class="modal" id="requestDocumentModal-${ii}" tabindex="-1" aria-labelledby="requestDocumentModal-${ii}Label" aria-hidden="false">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="requestDocumentModal-${ii}Label">Request Document</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-uploadDocument-popUpDialog1" id="form-uploadDocument-popUpDialog1-${ii}" enctype="multipart/form-data">
                                            <div class="form">
                                            
                                                <p class="group">
                                                    <input id="input-documentTitle" type="text" readonly value="${reqDocTitle}">
                                                    <label class="entered"  for="input-documentTitle">Document Title</label>
                                                </p>
                                                <p class="group">
                                                    <input id="input-documentType" type="text"  readonly value="${reqDocType}">
                                                    <label class="entered"  for="input-documentType">Document Type</label>
                                                </p>
                                                <p class="group">
                                                    <textarea id="input-documentDesc" type="text" readonly>${reqDocDesc}</textarea>
                                                    <label class="entered"  for="input-documentDesc">Document Description</label>
                                                </p>
                                            `

                if (data.user !== username) {
                    const newModalFileToUpload = `
                            <div class="file-input-div">
                                <input type="file" id="exampleFileUpload-${ii}" class="exampleFileUpload">
                                <p class="exampleFileUploadText">Drag your files here or click in this area.</p>
                            </div>`;

                    newModal += newModalFileToUpload
                }
                let newModal2;
                if (data.user !== username) {

                    newModal2 = `</div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" form="form-uploadDocument-popUpDialog1-${ii}" onclick="uploadRequestedDocument(${ii})">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                } else {
                    newModal2 = `</div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }

                newModal += newModal2

                correctMessageAccordingToType = htmlToDisplay
                $("body").append(newModal);
            }
            msgThreadLi.innerHTML = `<p class="sender-name">${data.user}</p> ${correctMessageAccordingToType} ${dateStr}`;

            chatThreads.appendChild(msgThreadLi);
            chatDiv.scrollTop = chatDiv.scrollHeight;

        });
    </script>
</body>

</html>