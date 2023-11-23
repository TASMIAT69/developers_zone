<?php
session_start();
include_once "db_connect.php";
?>

<!DOCTYPE html>
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
    <style>
       /* Style for the search form */
  .search-form {
    text-align: center;
    margin: 20px 0;
  }

  .search-input {
    width: 300px;
    padding: 10px;
    border: 2px solid #5753cc;
    border-radius: 5px;
    font-size: 16px;
  }

  .search-button {
    background-color: #5753cc;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  .search-button:hover {
    background-color: #463da8; /* Darker shade on hover */
  }
      </style>
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
              <a href="./index.php" class="nav-menu-items-active">Home</a>
            </li>
            <li class="px-3 list-unstyled">
              <a href="./about.php" class="nav-menu-items">About Us</a>
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
      <!-- Banner Start -->
      <div class="banner d-flex h-75 align-items-center justify-content-end">
        <!-- Banner Text Container -->
        <div
          class="font-weight-bold col-6 d-flex flex-column align-items-center"
        >
          <!-- Banner Text -->
          <h1 class="font-weight-bold">
            <div style="color:#9260f3">Find the Perfect <span class="fancy-font">Web</span></div>
            <div style="text-align:center;" class="bg-banner-text p-3 rounded">
              services for your Business
            </div>
          </h1>
        </div>
        <!-- Benner Image -->
        <div class="col-6">
          <img
            src="./images/rectangle-1@1x.svg"
            alt="rectangle"
            class="w-100 position-absolute z-index-minus"
          />
          <img
            src="./images/layer-1@1x.svg"
            alt="pic"
            class="mt-5 w-100 z-index-plus"
          />
        </div>
      </div>
      <!-- Banner End  -->
    </header>
    <!-- Header End  -->

  <main>
    <h2 style="margin-top: 10%" class="mx-auto text-center font-weight-bold bb">Our Professional Services</h2>
    <br>
    <br>
    <form method="GET" action="search.php" class="search-form">
  <input type="text" name="query" class="search-input" placeholder="Search by name or category">
  <button type="submit" class="search-button">Search</button>
</form>
    <?php
    if (isset($_GET['query'])) {
      $query = mysqli_real_escape_string($conn, $_GET['query']);
      $sql = "SELECT * FROM gig WHERE name LIKE '%$query%' OR developer_type LIKE '%$query%'";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>



<div class="col-md-3" style="float: left;">
            <div
              class="card mb-2"
              style="border-radius: 20px; background-color: whitesmoke"
            >
              <img
                style="height: 175px; width: 175px; border-radius: 50%"
                class="card-img-top mx-auto p-3"
                src="./images/03.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h4 class="card-title text-center"><b><?php echo $row['name']; ?></b></h4>
                <h4 class="card-title text-center"><b>Category : <?php echo $row['developer_type']; ?></b></h4>
                <p class="card-text text-left"><h4>Skills</h4><?php echo $row['skills']; ?></p>
                <p class="card-text text-left"><h4>Features</h4><?php echo $row['features']; ?></p>
                <p class="card-text text-left"><h4>Price</h4><b><?php echo $row['price']; ?> BDT</b></p>
                <div class="text-center">
                  <div class="rating">
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span
                      style="color: #5753cc"
                      class="fa fa-star-half-empty"
                    ></span>
                  </div>
                  <div>
                    <span style="color: #5753cc" class="fa fa-user m-2"></span>
                    125888 total votes
                  </div>
                </div>
                <div class="text-center m-2">
                  <a href="payment.php?gig_id=<?php echo $row['gig_id'];?>"
                  style="border-radius: 20px; background-color: #5753cc"
                  class="btn text-white px-4"
                  ><b>Hire Now</b></a
                >
                </div>
              </div>
            </div>
          </div>




       <?php }
      } 
      else {
        echo "<h2 style='text-align:center !important'>No results found.</h2>";
      }
    }
    
    
    else {
      // Display all services if no search query is provided
      $sql2 = "SELECT * FROM gig";
      $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
      // ... (rest of your existing code to display services)
      while($row = mysqli_fetch_array($result)) { ?>
       <div class="col-md-3" style="float: left;">
            <div
              class="card mb-2"
              style="border-radius: 20px; background-color: whitesmoke"
            >
              <img
                style="height: 175px; width: 175px; border-radius: 50%"
                class="card-img-top mx-auto p-3"
                src="./images/03.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h4 class="card-title text-center"><b><?php echo $row['name']; ?></b></h4>
                <h4 class="card-title text-center"><b>Category : <?php echo $row['developer_type']; ?></b></h4>
                <p class="card-text text-left"><h4>Skills</h4><?php echo $row['skills']; ?></p>
                <p class="card-text text-left"><h4>Features</h4><?php echo $row['features']; ?></p>
                <p class="card-text text-left"><h4>Price</h4><b><?php echo $row['price']; ?> BDT</b></p>
                <div class="text-center">
                  <div class="rating">
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span style="color: #5753cc" class="fa fa-star"></span>
                    <span
                      style="color: #5753cc"
                      class="fa fa-star-half-empty"
                    ></span>
                  </div>
                  <div>
                    <span style="color: #5753cc" class="fa fa-user m-2"></span>
                    125888 total votes
                  </div>
                </div>
                <div class="text-center m-2">
                  <a href="payment.php?gig_id=<?php echo $row['gig_id'];?>"
                  style="border-radius: 20px; background-color: #5753cc"
                  class="btn text-white px-4"
                  ><b>Hire Now</b></a
                >
                </div>
              </div>
            </div>
          </div>

  <?php  }} ?>
  </main>

  <!-- ... (your other script and HTML elements) ... -->



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
