<?php session_start();
include "db_connect.php";

if(!isset($_SESSION['user_id'])) {
	header('Location: login.php');
}
if(isset($_POST['update']))
{	
	$current = $_POST['current'];
  $id = $_SESSION['user_id'];
	
	$new = $_POST['new'];
	$confirm = $_POST['confirm'];
	
  $password = md5($current);
	
  $sql = "SELECT * FROM users WHERE user_id='$id' AND password='$password'";

  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($result) === 1) {
        if($new == $confirm){
          $new = md5($new);
          $id = $_SESSION['user_id'];
          $qry = "UPDATE users SET password='$new' WHERE user_id = '$id'";
          $result = mysqli_query($conn, $qry);
          if($result){
          //redirectig to the display page. In our case, it is view.php
          
          header("Location: changepass.php?success=Your password has been updated successfully");
        }else{
          header("Location: changepass.php?error= Password doesn't match");
          exit();
        }
          }else{
      header("Location: changepass.php?error=Incorrect  password");
          exit();
    }
  
  }}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Developers Zone</title>
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><a href="javascript:history.back()" style="text-decoration: none;color:white;cursor:pointer"><span>Back</span></a></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="./dashboard.php" class="active"><i style="font-size:25px;" class="las la-braille"></i>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="profile.php"><span class="las la-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="devchat.php"><span class="las la-user"></span>
                    <span>Chat</span></a>
                </li>
                <li>
                    <a href="./orders.php"><i style="font-size:25px;" class="lab la-opencart"></i>
                    <span>Orders</span></a>
                </li>
                <?php
            if($_SESSION['user_type'] =='developer'){
            ?>
                <li>
                  <a href="gig.php"><i style="font-size:25px;" class="las la-plus-square"></i>
                  <span>Gigs</span></a>
              </li>
              <li>
                  <a href="consub.php"><i style="font-size:25px;" class="las la-plus-square"></i>
                  <span>Contact Submissions</span></a>
              </li>
              
              <?php } ?>
                <li>
                    <a href="changepass.php"><i style="font-size:25px" class="las la-shield-alt"></i>
                    <span>Security</span></a>
                </li>
                <li>
                    <a href="./logout.php"><i style="font-size:25px" class="las la-sign-out-alt"></i>
                    <span>Log Out</span></a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Developers Zone
            </h2>
            <?php
            if($_SESSION['user_type'] =='user'){
            ?>
            
            <div class="px-4 py-2 orders" style="background:whitesmoke;"><b><a href="./services.php" style="float:right;text-decoration:none;color:#9260f3" class="mt-3">View Services</a></b></div>
          <?php } ?>

        </header>

        <main>
         

      <div
      style="background-color: white; border-radius: 30px 0px 0px 30px; padding: 100px"
      class="col-12"
    >
      <form
      action="changepass.php"
      method="POST"
        style="border: 1px solid #9260f3; border-radius: 50px"
        class="d-flex flex-column p-5"
      >
        <h4
          class="p-2 text-center rounded mt-5 mb-4"
          style="background-color: #9260f3; color: white"
        >
          Change Your Password
        </h4>
        <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
              <p class="success"><?php echo $_GET['success']; ?></p>
         <?php } ?>
       
        <div class="input-group mb-4">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"
                    ><b style="color: #9260f3">Current</b
                  ></span>
                </div>
                <input
                  placeholder="Current Password"
                  type="password"
                  required
                  name="current"
                  class="form-control"
                  aria-label="Default"
                  aria-describedby="inputGroup-sizing-default"
                />
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"
                    ><b style="color: #9260f3">New</b
                  ></span>
                </div>
                <input
                  placeholder="New Password"
                  type="password"
                  required
                  name="new"
                  class="form-control"
                  aria-label="Default"
                  aria-describedby="inputGroup-sizing-default"
                />
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"
                    ><b style="color: #9260f3">Re-type</b
                  ></span>
                </div>
                <input
                  placeholder="Confirm Password"
                  type="password"
                  required
                  name="confirm"
                  class="form-control"
                  aria-label="Default"
                  aria-describedby="inputGroup-sizing-default"
                />
              </div>
      

        <button
          style="border-radius: 50px; background-color: #fbb44a"
          type="submit"
          name="update"
          class="btn px-4 mx-auto"
        >
          <b>Update</b>
        </button>
      </form>
     
    </div>

  
        </main>

    </div>

</body>

</html>