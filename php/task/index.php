<!DOCTYPE html>

<html lang="en">
  <head>
    <?php include "../../components/common/header.php"; ?>      <!-- Common header file-->
    <?php include "../../components/task/header.php" ?>  <!-- Appointment specific header file -->
    <?php include "../../components/common/scripts.php"; ?>     <!-- Common script -->
    <title>Tasks</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.2/web-animations.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/haltu/muuri@0.9.5/dist/muuri.min.js"></script>

    <script>
      checkProtectedRoutes();
    </script>
  </head>

  <body>

    <!-- Navigation bar -->
    <?php include "../../components/common/navbar.php"; ?>

    <!-- A container to move all the content in center and 80% width -->
    <div class="main-content" id='appointment-mainContainer'>

      <div class='mb-3'>
        <h1 class="h1-main-title">Tasks</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
      </div>

      <?php include "../../components/task/modal.php"; ?>   <!-- The Bootstrap Modal form -->

  

      <!-- The charts and calendar place-->
      <?php include "../../components/task/charts.php"; ?>
      <?php include "../../components/task/taskCards.php"; ?>
        
      
    </div>


    <?php include "../../components/task/script.php"; ?>   <!-- appointment specific script -->

    <script>
      $('.h2-user-greeting').text(renderUserGreeting())
    </script>
  </body>
</html>