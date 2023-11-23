<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
} 
if($_SESSION['user_type']=='developer'){
  header("Location: devorder.php");
}
?>
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
            <h2><span class="las la-clinic-medical"></span> <a href="javascript:history.back()" style="text-decoration: none;color:white;cursor:pointer"><span>Back</span></a></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><i style="font-size:25px;" class="las la-braille"></i>
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
      <?php
      include_once "db_connect.php";
      if(isset($_GET['gig_id'])){
        $id = $_GET['gig_id'];
        $sql = "SELECT * FROM gig WHERE gig_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
      }
     
      ?>
        <form
        action="createorder.php"
        method="POST"
          style="border: 1px solid #9260f3; border-radius: 50px"
          class="d-flex flex-column p-5"
        >
          <h4
            class="p-2 text-center rounded mt-5 mb-4"
            style="background-color: #9260f3; color: white"
          >
            Input Payment Information
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
                ><b style="color: #9260f3" class="fa-solid fa-user">Full Name</b
              ></span>
            </div>
            <input
              placeholder="Your Full Name"
              name="fname"
              required
              type="text"
              class="form-control p-3"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Payment Method</label>
            </div>
            <select required name="ptype" class="custom-select" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="Bkash">Bkash</option>
              <option value="Nagad">Nagad</option>
              <option value="Rocket">Rocket</option>
            </select>
          </div>
          
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"
                ><b style="color: #9260f3" class="fa-thin fa-phone"></b
              ></span>
            </div>
            <input
              placeholder="Your Phone Number"
              required
              name="ynumber"
              type="text"
              class="form-control"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
            <input
              value="<?php echo $row['user_id']; ?>"
              hidden
              name="developer_id"
              class="form-control"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
          </div>
          <div class="input-group mb-4">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Developers Payment Number</label>
            </div>
            <input
              placeholder="Developers Number"
              name="dnumber"
              value="<?php echo $row['number']; ?>"
              type="text"
              class="form-control"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
          </div>
          <div class="input-group mb-4">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Pay Amount</label>
            </div>
            <input
              name="amount"
              value="<?php echo $row['price']; ?>"
              type="text"
              class="form-control"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"
                ><b style="color: #9260f3" class="fa-thin fa-phone"></b
              ></span>
            </div>
            <input
            name="trxid"
              placeholder="Transaction Id"
              required
              type="text"
              class="form-control"
              aria-label="Default"
              aria-describedby="inputGroup-sizing-default"
            />
          </div>
        

          <button
          name="pay"
            style="border-radius: 50px; background-color: #fbb44a"
            type="submit"
            class="btn px-4 mx-auto"
          >
            <b>Submit</b>
          </button>
        </form>
       
      </div>

      
        </main>

    </div>

</body>

</html>