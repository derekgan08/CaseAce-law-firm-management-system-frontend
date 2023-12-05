<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Register</title>
    <script>
        checkProtectedRoutes()
    </script>
</head>

<body>

    <form method="post" id="change-passwordForm">
        <div class="container">
            <h1>Change Password</h1>
            <p>Please fill in this form to change password.</p>
            <hr>

            <label for="change-passwordForm-oldpsw"><b>Old Password</b></label>
            <input type="password" placeholder="Enter Old Password" name="psw" id="change-passwordForm-oldpsw" required>

            <label for="change-passwordForm-newpsw"><b>New Password</b></label>
            <input type="password" placeholder="Enter New Password" name="psw" id="change-passwordForm-newpsw" required>

            <hr>

            <button type="submit" class="registerbtn">Change Password</button>
        </div>

    </form>
    <script>
        $("#change-passwordForm").submit(function(e) {
            e.preventDefault();

            // Get old password entered, using jQuery
            const reqBody = {
                oldpassword: $('#change-passwordForm-oldpsw').val(),
                newpassword: $('#change-passwordForm-newpsw').val(),
            }
            axios.put(`/api/crm/p`, reqBody).then(function(response) {
                if (response.status === 200) {
                    window.location.href = baseUrl + 'php/auth/login.php';
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
        });
    </script>
</body>

</html>

<style>
    * {
        box-sizing: border-box
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
</style>