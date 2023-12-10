<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Documents</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Documents</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="row-1 nested-flex-con-col">
                <div class="float-card info-float-card row-1" style="min-height: 380px;">
                    <div class="nested-flex-con-row">
                        <div style="width: 50%">
                            <h3 class="h3-semibold-24">Document Info </h3>

                        </div>
                        <div style="width: 50%">
                            <button type="button" id="document-icon-delete" data-bs-toggle="modal" data-bs-target="#editDocumentModal" style="background-color: #1c277e; width: 20%; display: none; cursor: pointer; margin-left: 1rem; margin-right: 3rem; float: right;" class="btn btn-primary" onclick="editDocument()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/design.png" alt="design" style="margin-right: 1rem;" />Edit</button>
                            <button type="button" id="document-icon-edit" style="border: 1px solid #1c277e; background-color: white; width: 20%; color: #1c277e; display: none; margin-left: 1rem;float: right;cursor: pointer;" class="btn btn-primary" onclick="deleteDocument()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/1c277e/filled-trash.png" alt="design" style="margin-right: 1rem;" />Delete</button>
                            <button type="button" id="document-icon-cancel" style="background-color: #1c277e; width: 20%; display: none; cursor: pointer; margin-left: 1rem; margin-right: 3rem; float: right;" class="btn btn-primary" onclick="confirmSave()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/checkmark--v1.png" alt="design" style="margin-right: 1rem;" />Save</button>
                            <button type="button" id="document-icon-save" style="border: 1px solid #1c277e; background-color: white; width: 20%; color: #1c277e; display: none; margin-left: 1rem;float: right;cursor: pointer;" class="btn btn-primary" onclick="cancelSave()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/1c277e/multiply.png" alt="design" style="margin-right: 1rem;" />Cancel</button>
                        </div>
                    </div>

                    <div class="nested-flex-con-row">
                        <div class="col-3">
                            <div class="hoverable-img" onclick="openClosePdf()">
                                <div class="img-wrap">
                                    <img src="" id="document-documentInfo-documentAvatar" alt="" />
                                </div>
                                <div class="middle-img-hover img-wrap">
                                    <div class="view-text img-wrap">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="row-1-statistics">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 85px;">Document Name</p>
                                            <div class="">
                                                <span class="info-text-document" id="document-documentInfo-documentName">Document1 .pdf asdfdfas </span>
                                                <input type="text" style="display: none; width: calc(100% - 3rem);" class="info-text-document" name="document-documentEditInfo-documentName" id="document-documentEditInfo-documentName" value="Document1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-1-statistics  mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 80px;">Document Description</p>
                                            <div class="info-text-document document-desc">
                                                <span class="info-text-document" id="document-documentInfo-documentDesc">Lorem ipsum dolor sit amet consectetur. Sit sit lacus rhoncus amet. Sed elementum convallis convallis amet tellus egestas et scelerisque at. Pretium nec varius posuere duis eget mi adipiscing. Nulla ipsum aliquam massa pulvinar in. Eget nunc semper felis massa sed </span>
                                                <textarea name="info-text-document" id="document-documentEditInfo-documentDesc" style="display: none; width: 100%;" rows="6">asfdasf</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row-1-statistics mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>

                                            <p>Last Accessed By<img width="24" id="document-icon-editAccess" onclick="editDocument()" style="display: none; cursor: pointer; margin-left: 1rem;" height="24" src="https://img.icons8.com/ios-glyphs/30/1c277e/design.png" alt="design" /></p>
                                            <div class="info-text-document">
                                                <span class="info-text-document" id="document-documentInfo-accessedBy"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png" alt="user-male-circle" style="margin-right: 0.5rem;" />Dato Seri Mh Lim Cho</span>
                                                <span class="last-accessed" id="document-documentInfo-accessedTime">1 day ago...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics">
                                        <div>
                                            <p style="width: 85px;">Related Case</p>
                                            <div class="">
                                                <span class="info-text-document" id="document-documentInfo-relatedCase">Document1 .pdf asdfdfas </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Document Size</p>
                                            <div>
                                                <span class="info-text-document" id="document-documentInfo-documentSize">99kB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Document Type</p>
                                            <div>
                                                <span class="info-text-document" id="document-documentInfo-documentType">Individual</span>
                                                <input type="text" style="display: none; " class="info-text-document" name="document-documentEditInfo-documentType" id="document-documentEditInfo-documentType">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Uploaded by</p>
                                            <div class="">
                                                <span class="info-text-document" id="document-documentInfo-uploadedBy"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png" alt="user-male-circle" style="margin-right: 0.5rem;" />Dato Seri Mh Lim Cho</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Uploaded Date</p>
                                            <div class="">
                                                <span class="info-text-document" id="document-documentInfo-uploadedAt">08.25 am, 12 November 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="h3-semibold-24 non-float-card">All Documents</h3>
        <div class="table-section" style="height: 39%; width: 100%;overflow-y: scroll;">
            <table id="document-allDocument-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-2">Name

                        </th>
                        <th class="col-1">Type

                        </th>
                        <th class="col-1">File Size

                        </th>
                        <th class="col-2">Uploaded By

                        </th>
                        <th class="col-2">Case Involved

                        </th>
                        <th class="col-2">Updated Date

                        </th>
                        <th class="col-2">Last Accessed

                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
    <div class="document-iframe-wrap" onclick="openClosePdf()">
        <iframe id="document-documentInfo-documentIFrame" class="" height="500px">
            <!-- <p>Unable to display PDF file. <a href="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf">Download</a> instead.</p> -->
        </iframe>
    </div>
    <div class="modal" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editDocumentModalLabel">Edit Document Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-editDocument-popUpDialog2" class="form-uploadDocument-popUpDialog1">
                        <div class="form">
                            <p class="group">
                                <input id="input-documentTitle" type="text" required>
                                <label for="input-documentTitle">Document Title</label>
                            </p>
                            <p class="group">
                                <input id="input-documentType" type="text" list="documentTypeList-edit" oninput="suggestDocumentTypes('edit')" required>
                                <datalist id="documentTypeList-edit">
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
                                <textarea id="input-documentDesc" type="text" required ></textarea>
                                <label for="input-documentDesc">Document Description</label>
                            </p>
                            <div class="file-input-div" style="border: 4px dashed #1c277e80; color: #1c277e80">
                                <!-- <input type="file" id="exampleFileUpload" multiple> -->
                                <p id="exampleFileUploadText">Drag your files here or click in this area.</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border: 1px solid #1c277e; background-color: white; width: 25%; color: #1c277e;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtnEditForm" style="background-color: #1c277e; width: 25%;" class="btn btn-primary" onclick="confirmSave()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.h2-user-greeting').css("display", "none")
        let canAccessList = []

        // get the documentID and caseID
        const urlParams = new URLSearchParams(window.location.search);
        const docId = urlParams.get('id');
        const caseId = urlParams.get('cid');

        // Toggle effect for open and close the embed pdf when clicked
        const openClosePdf = () => {
            if ($('.document-iframe-wrap').css("visibility") === "hidden") {
                $('.document-iframe-wrap').css("visibility", "visible")
            } else {
                $('.document-iframe-wrap').css("visibility", "hidden")
            }
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
                case 'edit': {
                    currentFormId = "#form-editDocument-popUpDialog2"
                    datalistElement = $(currentFormId + " #documentTypeList-edit")
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

        // get document details, and update the UI
        axios.get(`/api/documents/${docId}/${caseId}`, )
            .then(function(response) {
                const {
                    canEdit,
                    doc_avatar,
                    doc_type,
                    doc_title,
                    doc_description,
                    doc_link_file,
                    doc_link_fileId,
                    uploaded_at,
                    uploaded_by,
                    doc_case_related,
                    last_accessed_at,
                    can_be_access_by,
                    filesize,
                    uploadedByUserName,
                    lastAccessedByUserName,
                    relatedCaseName
                } = response.data;

                canAccessList = can_be_access_by

                $('#document-documentInfo-uploadedAt').text(changeToReadableFormat(uploaded_at))
                const uploadedByUserInfo = ""
                const userAvatarImg =
                    uploadedByUserName.avatar_url !== "" &&
                    uploadedByUserName.avatar_url &&
                    uploadedByUserName.avatar_url !== "undefined" ?
                    uploadedByUserName.avatar_url :
                    "https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png"
                $('#document-documentInfo-uploadedBy').html(`<img width="30" height="30" src="${userAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + uploadedByUserName.username)
                $('#document-documentInfo-relatedCase').text(relatedCaseName.case_title)

                $('#document-documentInfo-documentSize').text(formatFileSize(filesize))
                $('#document-documentInfo-documentType').text(doc_type)
                $('#input-documentType').val(doc_type)


                $('#document-documentInfo-documentDesc').text(doc_description)
                $('#input-documentDesc').text(doc_description)

                $('#exampleFileUploadText').html('<img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />' + doc_title);

                $('#input-documentTitle').val(doc_title)
                $('#document-documentInfo-documentName').text(doc_title)
                const accessedByUserInfo = ""

                const accessedByUserAvatarImg =
                    lastAccessedByUserName.avatar_url !== "" &&
                    lastAccessedByUserName.avatar_url &&
                    lastAccessedByUserName.avatar_url !== "undefined" ?
                    lastAccessedByUserName.avatar_url :
                    "https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png"
                $('#document-documentInfo-accessedBy').html(`<img width="30" height="30" src="${accessedByUserAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + lastAccessedByUserName.username)
                $('#document-documentInfo-accessedTime').text(changeToReadableFormat(last_accessed_at[0].access_date_time))
                $('#document-documentInfo-documentAvatar').attr("src", doc_avatar)
                // const new_doc_link = `http://docs.google.com/gview?url=${doc_link_file}&embedded=true`
                const new_doc_link = `http://docs.google.com/gview?a=v&pid=explorer&chrome=false&api=true&embedded=true&srcid=${doc_link_fileId}&hl=en&embedded=true`
                $('#document-documentInfo-documentIFrame').attr("src", new_doc_link)

                if (canEdit) {
                    $('#document-icon-delete').css("display", "block")
                    $('#document-icon-edit').css("display", "block")
                }

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

        // Change the display properties when clicked edit
        const editDocument = () => {
            // $('#document-icon-save').css("display", "block")
            // $('#document-icon-cancel').css("display", "block")
            $('#document-icon-editAccess').css("display", "inline")
            // $('#document-icon-delete').css("display", "none")
            // $('#document-icon-edit').css("display", "none")

            // $('#document-documentEditInfo-documentType').css("display", "block")
            // $('#document-documentEditInfo-documentDesc').css("display", "block")
            // $('#document-documentEditInfo-documentName').css("display", "block")

            // $('#document-documentInfo-documentType').css("display", "none")
            // $('#document-documentInfo-documentDesc').css("display", "none")
            // $('#document-documentInfo-documentName').css("display", "none")
        }

        // Send update request to server if requested
        const sendUpdateRequest = () => {
            var t = document.getElementById('input-documentDesc');
            t.textContent = t.value;
            const reqBody = {
                q: {
                    q_id: docId,
                    q_caseId: caseId
                },
                doc_type: $('#input-documentType').val(),
                doc_title: $('#input-documentTitle').val(),
                doc_description: t.textContent,
                can_be_access_by: canAccessList
            }
            axios.put(`/api/documents/`, reqBody).then(function(response) {
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

        // change the display properties when clicked cancel
        const cancelSave = () => {
            // $('#document-icon-save').css("display", "none")
            // $('#document-icon-cancel').css("display", "none")
            // $('#document-icon-delete').css("display", "block")
            // $('#document-icon-edit').css("display", "block")

            // $('#document-documentEditInfo-documentType').css("display", "none")
            // $('#document-documentEditInfo-documentDesc').css("display", "none")
            // $('#document-documentEditInfo-documentName').css("display", "none")

            // $('#document-documentInfo-documentType').css("display", "block")
            // $('#document-documentInfo-documentDesc').css("display", "block")
            // $('#document-documentInfo-documentName').css("display", "block")
        }


        // Send update request if update button is clicked
        const confirmSave = () => {
            $('#saveBtnEditForm').html('<img width="20" heigjt="20" src="../../../assets/loading.gif">')
            $('#saveBtnEditForm').prop('disabled', 'true')
            sendUpdateRequest()
        }

        // Send delete request if requested
        const sendDeleteRequest = () => {
            axios.delete(`/api/documents/${docId}/${caseId}`).then(function(response) {
                if (response.status === 200) {
                    window.location.href = baseUrl + 'php/document';
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

        // When onclick delete button, send delete request to backend
        const deleteDocument = () => {
            sendDeleteRequest();
        }

        // get all related case documents
        axios.get(`/api/documents/all/${caseId}`, )
            .then(function(response) {

                // TODO: Convert into data and render it
                const documentData = response.data
                documentData.forEach(doc => {
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

                    const docName = `${doc.doc_title}`
                    const uploadedDate = new Date(parseInt(doc.uploaded_at))
                    const formatedUploadedDate = `${uploadedDate.getDate()}, ${monthNames[uploadedDate.getMonth()]} ${uploadedDate.getFullYear()}`
                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/document/view.php?id=' + doc._id + '&cid=' + doc.doc_case_related + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />' + docName + '</a></td>' +
                        '<td>' + doc.doc_type + '</td>' +
                        '<td>' + formatFileSize(doc.filesize) + '</td>' +
                        `<td><img width="20" height="20" src="${uploadedByUserAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + doc.uploadedByUserName.username + '</td>' +
                        '<td>' + doc.relatedCaseName.case_title + '</td>' +
                        '<td>' + formatedUploadedDate + '</td>' +
                        `<td><img width="20" height="20" src="${accessedByUserAvatarImg}" alt="user-male-circle" style="margin-right: 0.5rem;" />` + doc.lastAccessedByUserName.username + '</td>' +
                        '</tr>';
                    $('#document-allDocument-table tbody').append(markup);
                });

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
                    launchErrorModal(error.response.data.message)
                }
            });

        endLoader();
    </script>
</body>

</html>