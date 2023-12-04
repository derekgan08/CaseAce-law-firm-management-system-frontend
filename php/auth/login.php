<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Login</title>
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
            margin: 1.25rem 0 2.5rem 0;
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
        <h1>Login</h1>
        <form method="post" id="auth-login-loginForm">
            <div class="form-control-login">
                <input type="text" required id="auth-login-loginForm-email" name="auth-login-loginForm-email">
                <label>Email</label>
            </div>
            <div class="form-control-login">
                <input type="password" required id="auth-login-loginForm-password" name="auth-login-loginForm-password">
                <label>Password</label>
            </div>
            <button class="btn-login" type="submit">Login</button>
            <p class="text">Don't have an account? <a href="/php/auth/register.php">Register</a></p>
        </form>
    </div>

    <script>
        const labels = document.querySelectorAll('.form-control-login label')

        labels.forEach(label => {
            label.innerHTML = label.innerText
                .split('')
                .map((letter, index) => `<span style="transition-delay:${index * 40}ms">${letter}</span>`)
                .join('')
        })

        $("#auth-login-loginForm").submit(function(e) {
            e.preventDefault();

            // Get email and password entered, using jQuery
            const email = $('#auth-login-loginForm-email').val()
            const password = $('#auth-login-loginForm-password').val()

            axios.post('/auth/login', {
                    email,
                    password
                })
                .then(function(response) {
                    // Store the token in localStorage
                    if (response.data.token && response.data.type) {
                        localStorage.setItem('authToken', response.data.token);
                        localStorage.setItem('type', response.data.type);
                        localStorage.setItem('name', response.data.name);
                    }

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