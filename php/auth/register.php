<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        :root {
            font-size: 100%;
            --white: oklch(100% 0 0);
            --primary-light: oklch(78.81% 0.109 255.212);
            --primary: oklch(58.63% 0.227 281.34);
            --primary-dark: oklch(47.56% 0.273 284.25);

            --greyLight-1: oklch(93.77% 0.015 257.2);
            --greyLight-2: oklch(85.86% 0.033 270.41);
            --greyDark: oklch(73.91% 0.056 267.7);

            --background: var(--white);
            --onBackground: var(--greyDark);

            --surface: var(--primary);
            --onSurface: var(--white);
            --onSurface-Dark: oklch(58.2% 0.228 266.74);

            --shadow: .3rem .3rem .6rem var(--greyLight-2),
                -.2rem -.2rem .5rem var(--white);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
        }

        .container-login {
            background-color: var(--background);
            color: var(--onBackground);
            padding: 1.25rem 2.5rem;
            border-radius: 1.5rem;
            box-shadow: var(--shadow);
        }

        .container-login h1 {
            font-size: 1.8rem;
            text-align: center;
            padding-bottom: 1.25rem;
            font-weight: 600;
        }

        .container-login a {
            text-decoration: none;
            color: var(--onSurface-Dark);
        }

        .form-control-login {
            position: relative;
            /* margin: 1.25rem 0 2.5rem 0; */
            width: 18.75rem;
        }

        .form-control-login input {
            background-color: transparent;
            border: 0;
            border-bottom: 0.125rem var(--onBackground) solid;
            display: block;
            width: 100%;
            padding: .9rem;
            font-size: 1.2rem;
            color: var(--onBackground);
            font-weight: 400;
        }

        .form-control-login input:focus,
        .form-control-login input:valid {
            outline: 0;
            border-bottom-color: var(--greyLight-2);
        }

        .form-control-login label {
            position: absolute;
            top: .9rem;
            left: 0;
        }

        .form-control-login label span {
            display: inline-block;
            font-size: 1.2rem;
            min-width: .3rem;
            transition: 300ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .form-control-login input:focus+label span,
        .form-control-login input:valid+label span {
            color: var(--greyLight-2);
            transform: translateY(-1.875rem);
            font-size: 1rem;
        }

        .btn-login {
            cursor: pointer;
            display: inline-block;
            width: 100%;
            background: var(--surface);
            padding: .9rem;
            font-family: inherit;
            font-size: 1.2rem;
            border: 0;
            border-radius: .8rem;
            box-shadow: inset .2rem .2rem 1rem var(--primary-light),
                inset -.2rem -.2rem 1rem var(--primary-dark),
                var(--shadow);
            color: var(--greyLight-1);
            transition: 300ms ease;
            font-weight: 500;
        }

        .btn-login:focus {
            outline: 0;
        }

        .btn-login:hover {
            color: var(--onSurface);
        }

        .btn-login:active {
            box-shadow: inset .2rem .2rem 1rem var(--primary-dark),
                inset -.2rem -.2rem 1rem var(--primary-light);
            color: var(--onSurface);
        }

        .text {
            margin-top: 1.875rem;
            text-align: center;
            font-size: .8rem;
            font-weight: 400;
        }

        .caseace-form {
            color: #1c277e;
            text-align: center;
            font-family: Cinzel serif;
            font-weight: 700;
            font-size: 3rem !important;
            margin-bottom: 0rem;
        }
    </style>
    <script>
        checkUnprotectedRoutes()
    </script>
</head>

<body>
    <div class="container-login">
        <h1 class="caseace-form">CaseAce</h1>
        <h1>Register</h1>
        <form method="post" id="auth-register-registerForm">
                <!-- <div class="form-control-login">
                    <input type="text" required id="auth-login-loginForm-email" name="auth-login-loginForm-email">
                    <label>Email</label>
                </div>
                <div class="form-control-login">
                    <input type="password" required id="auth-login-loginForm-password" name="auth-login-loginForm-password">
                    <label>Password</label>
                </div> -->

            <div class="form-control-login">
                <input type="text" name="email" id="auth-register-registerForm-email" required>
                <label for="auth-register-registerForm-email">Email</label>
            </div>

            <div class="form-control-login">
                <input type="password" name="psw" id="auth-register-registerForm-psw" required>
                <label for="auth-register-registerForm-psw">Password</label>
            </div>

            <div class="form-control-login">
                <input type="text" name="username" id="auth-register-registerForm-username" required>
                <label for="auth-register-registerForm-username">Username</label>
            </div>

            <div class="form-control-login">
                <input type="text" name="number" id="auth-register-registerForm-number" required>
                <label for="auth-register-registerForm-number">Contact Number</label>
            </div>

            <div class="form-control-login">
                <input type="text" name="address" id="auth-register-registerForm-address" required>
                <label for="auth-register-registerForm-address">Address</label>
            </div>

            <button class="btn-login" type="submit">Register</button>
            <p class="text">Already have an account? <a href="/php/auth/login.php">Login</a></p>
        </form>
    </div>
    <!-- <form method="post" id="auth-register-registerForm">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            
            <hr>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form> -->
    <script>
        const labels = document.querySelectorAll('.form-control-login label')

        labels.forEach(label => {
            label.innerHTML = label.innerText
                .split('')
                .map((letter, index) => `<span style="transition-delay:${index * 40}ms">${letter}</span>`)
                .join('')
        })
        $("#auth-register-registerForm").submit(function(e) {
            e.preventDefault();

            // Get email and password entered, using jQuery
            const email = $('#auth-register-registerForm-email').val()
            const password = $('#auth-register-registerForm-psw').val()
            const username = $('#auth-register-registerForm-username').val()
            const number = $('#auth-register-registerForm-number').val()
            const address = $('#auth-register-registerForm-address').val()
            const type = $('#auth-register-registerForm-type').val()
            const avatar_url = $('#auth-register-registerForm-url').val()
            axios.post('/auth/register', {
                    email,
                    password,
                    username,
                    number,
                    address,
                })

                .then(function(response) {
                    // Redirect to the protected page
                    window.location.href = baseUrl + 'php/dashboard.php';
                })
                .catch(function(error) {
                    launchErrorModal(error.response.data.message)
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