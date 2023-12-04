<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Login</title>
    <script>
        localStorage.clear()
        window.location.href = baseUrl + 'php/auth/login.php';
    </script>
</head>

<body>


</body>

</html>