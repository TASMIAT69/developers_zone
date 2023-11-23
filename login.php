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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
          <a href="./index.php"
            ><img
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
              <a href="./services.php" class="nav-menu-items">Services</a>
            </li>
            <li class="px-3 list-unstyled pointer">
              <a href="./login.php" class="nav-menu-items-active">Login</a>
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
          </ul>
        </div>
      </nav>
      <!-- Navbar end -->

      <!-- Banner End  -->
    </header>
    <!-- Header End  -->
    <!-- Main Start -->
    <main>
      <div
        style="background: linear-gradient(180deg, #fec4ed 0%, #caadf8 100%)"
        class="d-flex align-items-center justify-content-center"
      >
        <div class="col-6 h-100">
          <img
            class="img-fluid w-75"
            src="./images/19l--converted--01-1-1@1x.svg"
            alt=""
          />
        </div>
        <div
          style="background-color: white; border-radius: 30px 0px 0px 30px; padding: 100px"
          class="col-6"
        >
          <form
          action="./login-check.php"
          method="POST"
            style="border: 1px solid #9260f3; border-radius: 50px"
            class="d-flex flex-column p-5"
          >
            <h4
              class="p-2 text-center rounded mt-5 mb-4"
              style="background-color: #9260f3; color: white"
            >
              Please Log In
            </h4>
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
              <p class="success"><?php echo $_GET['success']; ?></p>
         <?php } ?>

            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"
                  ><img src="./images/login/EMAIN.svg" alt=""></span>
              </div>
              <input
                placeholder="email"
                required
                name="email"
                type="email"
                class="form-control p-3"
                aria-label="Default"
                aria-describedby="inputGroup-sizing-default"
              />
            </div>

            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"
                  ><img src="./images/login/PASSWORD.svg" alt=""></span>
              </div>
              <input
                placeholder="Password"
                name="password"
                type="password"
                class="form-control"
                aria-label="Default"
                aria-describedby="inputGroup-sizing-default"
              />
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"
                  ><span style="color:#9260f3;font-size:20px;" class="las la-user"></b
                ></span>
              </div>
              <select name="type" style="font-size: 15px; font-weight: 700;" class="form-control" id="exampleFormControlSelect1">
                <option value="">Please Select User Type</option>
                <option value="user">User</option>
                <option value="developer">Developer</option>
              
              </select>
            </div>

            <button
              style="border-radius: 50px; background-color: #fbb44a"
              type="submit"
              class="btn px-4 mx-auto"
            >
              <b>Log In</b>
            </button>
          </form>
          <a href="#" style="text-decoration: none; cursor: pointer">
            <h4
              class="p-2 text-center rounded mt-5 mb-4"
              style="background-color: #f14336; color: white"
            >
              <img
                src="./images/icons8-google.svg"
                alt="google"
                style="width: 30px"
                class="bg-white full-rounded"
              />
              Or Sign up with Google
            </h4>
          </a>
          <p class="text-center">
            Don't have an account? <a href="./login1.php">Join Now</a>
          </p>
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
