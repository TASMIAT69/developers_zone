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
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./index.css" />
    <title>Developer Zone</title>
  </head>
  <body>
    <!-- Header -->
    <header>
      <!-- navigation bar  -->
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
              <a href="./about.php" class="nav-menu-items-active">About Us</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./contact.php" class="nav-menu-items">Contact</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./services.php" class="nav-menu-items"
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

      <!-- Banner End  -->
    </header>
    <!-- Header End  -->
    <!-- Main Start -->
    <div class="d-flex">
      <main class="w-50 p-5">
        <!-- Contact Header-->
        <div class="d-flex flex-column">
          <div style="margin-top: 60px; font-size: 60px; color: #ef8200">
            <b
              ><span style="color: #4b7eff">About</span>
              <span style="color: #f75284">Us</span></b
            >
          </div>
        </div>
        <div class="d-flex flex-column">
          <h2 class="my-5">
            High-quality IT Services For the Budget Conscious
          </h2>
          <p>
            Our elite teams deliver mobile apps, desktop software, world-class
            design work – anything internet, really. We’ve spent a tremendous
            amount of time and money building a team of experts to save you time
            and money.
          </p>
          <button
            style="border-radius: 50px; color: white; background-color: #9d88ff"
            type="submit"
            class="btn px-4 w-25"
          >
            <b>Learn More</b>
          </button>
        </div>
      </main>
      <div class="w-50 bg-contact custom-rounded-about">
        <img src="./images/contact.svg" alt="" />
      </div>
    </div>
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
