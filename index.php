<!DOCTYPE html>
<?php session_start();
include_once "db_connect.php";
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />




  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/plugins/animate-css/animates.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/plugins/themify/css/themify-icons.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css">
  <link rel="stylesheet" href="assets/plugins/animated-text/animated-text.css">
  <!-- Slick Carousel CSS -->
  <link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick-theme.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css">
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
      background-color: #463da8;
      /* Darker shade on hover */
    }
  </style>
  <link rel="stylesheet" href="./index.css" />
  <title>Developer Zone</title>
</head>

<body>
  <!-- Header -->
  <header>
    <!-- navigation bar  -->
    <nav class="d-flex justify-content-between align-items-center nav-mx my-2">
      <div>
        <!-- Logo -->
        <a href="./index.php"><img src="./images/developer-zone-01-1@2x.svg" alt="logo" class="w-100" /></a>
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
            <a href="./services.php" class="nav-menu-items">Services</a>
          </li>

          <?php if (!isset($_SESSION['user_id'])) {
            ?>
            <li class="px-3 list-unstyled pointer">
              <a href="./login.php" class="nav-menu-items">Login</a>
            </li>
            <li style="border: 1px solid #9260f3; background: white"
              class="px-3 list-unstyled bg-purple-gradient custom-rounded px-4 py-1 ml-2 text-white font-weight-bold pointer">
              <a style="text-decoration: none; color: #9260f3" class="nav-menu-items" href="./login1.php">Join</a>
            </li>
          <?php } else { ?>
            <li class="px-3 list-unstyled">
              <a href="./dashboard.php" class="nav-menu-items">Profile</a>
            </li>
          <?php } ?>

        </ul>
      </div>
    </nav>
    <!-- Navbar end -->
    <!-- Banner Start -->
    <div class="banner d-flex h-75 align-items-center justify-content-end">
      <!-- Banner Text Container -->
      <div class="font-weight-bold col-6 d-flex flex-column align-items-center">
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
        <img src="./images/rectangle-1@1x.svg" alt="rectangle" class="w-100 position-absolute z-index-minus" />
        <img src="./images/layer-1@1x.svg" alt="pic" class="mt-5 w-100 z-index-plus" />
      </div>
    </div>
    <!-- Banner End  -->
  </header>
  <!-- Header End  -->
  <!-- Main Start -->
  <main>
    <!-- Main Header  -->

    <h2 style="margin-top: 10%" class="mx-auto text-center font-weight-bold bb">
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
          <a href="./seo.php"> <img src="./images/untitled-2-04-1@1x.png" alt="main-img-4" /></a>
        </div>
      </div>
    </div>


    <h2 style="margin-top: 10%" class="mx-auto text-center font-weight-bold bb">
      Please Search Gig Here
    </h2>
    <br>
    <br>


    <form method="GET" action="search.php" class="search-form">
      <input type="text" name="query" class="search-input" placeholder="Search by name or category">
      <button type="submit" class="search-button">Search</button>
    </form>

    <section style="padding:20px 0px !important" class="section" id="blog">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-title text-center">
              <h2 class="mb-4 text-lg">Gigs Feed</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <?php
          $sql = "SELECT * FROM gig";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $i = 0;
          while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col-lg-4 col-md-6" style="float: left;">
              <div class="card mb-2"
                style="border-radius: 20px; background-color: whitesmoke; min-height:700px !important;">
                <img style="height: 175px; width: 175px; border-radius: 50%" class="card-img-top mx-auto p-3"
                  src="./images/03.png" alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title text-center"><b>
                      <?php echo $row['name']; ?>
                    </b></h4>
                  <h4 class="card-title text-center"><b>Category :
                      <?php echo $row['developer_type']; ?>
                    </b></h4>
                  <p class="card-text text-left">
                  <h4>Skills</h4>
                  <?php echo $row['skills']; ?>
                  </p>
                  <p class="card-text text-left">
                  <h4>Features</h4>
                  <?php echo $row['features']; ?>
                  </p>
                  <p class="card-text text-left">
                  <h4>Price</h4><b>
                    <?php echo $row['price']; ?> BDT
                  </b></p>
                  <div class="text-center">
                    <div class="rating">
                      <span style="color: #5753cc" class="fa fa-star"></span>
                      <span style="color: #5753cc" class="fa fa-star"></span>
                      <span style="color: #5753cc" class="fa fa-star"></span>
                      <span style="color: #5753cc" class="fa fa-star"></span>
                      <span style="color: #5753cc" class="fa fa-star"></span>
                      <span style="color: #5753cc" class="fa fa-star-half-empty"></span>
                    </div>
                  </div>
                  <div class="text-center m-2">
                    <a href="payment.php?gig_id=<?php echo $row['gig_id']; ?>"
                      style="border-radius: 20px; background-color: #5753cc" class="btn text-white px-4"><b>Hire
                        Now</b></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
      </div>
    </section>

    <section style="padding:5px 0px !important" class="section" id="testimonial">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="title">
              <h2 class="mb-5 text-lg">Clients says</h2>
              <p class="mb-5 ">While reviews can accumulate on their own, they shouldn’t exist in a vacuum. Knowing how
                to ask for reviews, leverage them to get more business, and respond to less-than-favorable customer
                testimonials can improve your business image and land you more long-lasting customers.</p>
              <a style="background:#5753cc !important" href="#contact" class="btn btn-main btn-rounded smoth-scroll">Get
                start<i class="fa fa-angle-right ml-2"></i></a>
            </div>
          </div>


          <div class="col-lg-7">
            <div class="main-slider ">
              <div class="testimonial-item d-flex align-items-center">
                <div class="testimonial-content ">
                  <i class="ti-quote-left "></i>
                  <h4 class="mb-3 text-color mt-2">Graphic Design</h4>
                  <p>You’re the BEST. Loved working for you and look forward to working with you again one day! Wishing
                    you all the success in the world</p>
                  <div class="info">
                    <h5 class="mb-1">Al Aowshad Himel</h5>
                    <p class="text-sm">Bangladesh</p>
                  </div>
                </div>
                <div class="testimonial-image">
                  <img src="Curtis Jacobs.png" alt="" class="img-fluid">
                </div>
              </div>

              <div class="testimonial-item d-flex align-items-center">
                <div class="testimonial-content ">
                  <i class="ti-quote-left "></i>
                  <h4 class="mb-3 text-color mt-2">Web Development</h4>
                  <p>A complete pleasure to work with you…and I hope I can be of service to you again in the future!</p>
                  <div class="info">
                    <h5 class="mb-1">Tasmit Ahmed Sisir</h5>
                    <p class="text-sm">Dhaka</p>
                  </div>
                </div>
                <div class="testimonial-image">
                  <img src="Bernie Little.png" alt="" class="img-fluid">
                </div>
              </div>


              <div class="testimonial-item d-flex align-items-center">
                <div class="testimonial-content ">
                  <i class="ti-quote-left "></i>
                  <h4 class="mb-3 text-color mt-2">UI/UX</h4>
                  <p>I wish you all the success in the world. Thank you for being such a delight to work with! Let me
                    know if you need me for any future projects.</p>
                  <div class="info">
                    <h5 class="mb-1">Rifat Ibna Azad</h5>
                    <p class="text-sm">India</p>
                  </div>
                </div>
                <div class="testimonial-image">
                  <img src="Prof. Denis.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact Form -->
    <section style="margin-top:-100px;" class="section" id="contact">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="section-title text-center">
              <h2 class="text-lg">Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <form class="contact__form form-row contact-form" method="post" action="process_contact.php"
              id="contactForm" onsubmit="showSuccessAlert();">
              <div class="row">
                <div class="col-12">
                  <div class="alert alert-success contact__msg" style="display: none" role="alert">
                    Your message was sent successfully.
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Your Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                      placeholder="Enter Your Email Address">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Your Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control"
                      placeholder="Enter Your Subject">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Your Message</label>
                    <textarea id="message" name="message" cols="30" rows="8" class="form-control"
                      placeholder="Your Message"></textarea>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="d-lg-flex justify-content-between mt-4">
                  <p>* Rest assured. We will not spam your inbox.</p>
                  <input style="background:#5753cc !important" type="submit" name="submit"
                    class="btn btn-main btn-rounded" value="Send Message">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>





  </main>
  <script>
    function showSuccessAlert() {
      alert("Your message was sent successfully.");
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>


</body>

</html>