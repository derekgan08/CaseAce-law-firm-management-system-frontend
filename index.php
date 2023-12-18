<!DOCTYPE html>
<html lang="en">

<head>

        <?php include "./components/common/header.php"; ?>
        <?php include "./components/common/scripts.php" ?>

    <title>Document</title>
</head>

<body>
    <a href="./aboutme.html">About </a>
    <script>
        checkProtectedRoutes()
        window.location.replace(baseUrl + 'php/dashboard.php');
    </script>
</body>

</html>