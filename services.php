<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./index.css" />
    <title>Developer Zone</title>
  </head>
  <body>
    <!-- Header -->
    <header>
      <!-- navigation bar  -->
      <nav
        class="d-flex justify-content-between align-items-center nav-mx my-2"
      >
        <div>
          <!-- Logo -->
         <a href="./index.php"><img
            src="./images/developer-zone-01-1@2x.svg"
            alt="logo"
            class="w-100"
          /></a>
        </div>
        <div>
          <!-- Menus -->
          <ul class="d-flex justify-content-around align-items-center">
            <li class="px-3 list-unstyled">
              <a href="./index.php" class="nav-menu-items">Home</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./about.php" class="nav-menu-items">About Us</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./contact.php" class="nav-menu-items">Contact</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./services.php" class="nav-menu-items-active"
                >Services</a
              >
            </li>
           
         <?php if(!isset($_SESSION['user_id'])){ 
         ?>
            <li class="px-3 list-unstyled pointer">
              <a href="./login.php" class="nav-menu-items">Login</a>
            </li>
              <li
            style="border: 1px solid #9260f3; background: white"
            class="px-3 list-unstyled bg-purple-gradient custom-rounded px-4 py-1 ml-2 text-white font-weight-bold pointer"
          >
            <a
              style="text-decoration: none; color: #9260f3"
              class="nav-menu-items"
              href="./login1.php"
              >Join</a
            >
          </li>
          <?php } else {  ?>
            <li class="px-3 list-unstyled">
              <a href="./dashboard.php" class="nav-menu-items"
                >Profile</a
              >
            </li>
            <?php } ?>

          </ul>
        </div>
      </nav>
      <!-- Navbar end -->
      <!-- Banner Start -->
      <div>
        <img class="w-100" src="./images/SERVICES BG.jpg" alt="wedev" />
      </div>
      <!-- Banner Text Container -->

      <!-- Banner End  -->
    </header>
    <!-- Header End  -->
    <!-- Main Start -->
    <main>
      <!-- Main Header  -->

      <h2
        style="margin-top: 10%"
        class="mx-auto text-center font-weight-bold bb"
      >
        Our Professional Services
      </h2>

      <div class="grid">
        <div class="row">
          <div class="cols zoom">
            <a href="./webdev.php"><img src="./images/untitled-2-01-1@1x.png" alt="main-img-1" /></a>
          </div>
          <div class="cols zoom">
            <a href="./uiux.php"><img src="./images/untitled-2-02-1@1x.png" alt="main-img-2" /></a>
          </div>
        </div>
        <div class="row">
          <div class="cols zoom">
           <a href="./appdev.php"> <img src="./images/untitled-2-03-1@1x.png" alt="main-img-3" /></a>
          </div>
          <div class="cols zoom">
         <a href="./seo.php">   <img src="./images/untitled-2-04-1@1x.png" alt="main-img-4" /></a>
          </div>
        </div>
      </div>
    </main>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
