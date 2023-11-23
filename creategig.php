<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['price']) && isset($_POST['skills']) && isset($_POST['features']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $number = validate($_POST['number']);
    $price = validate($_POST['price']);
	$skills = validate($_POST['skills']);
    $features = validate($_POST['features']);
    $user_id = $_SESSION['user_id'];
    $usermail = $_SESSION['email'];


	if (empty($name)) {
		header("Location: gig.php?error=Email is required");
	    exit();
	}else if(empty($email)){
        header("Location: gig.php?error=Password is required");
	    exit();
	}
    else if(empty($number)){
        header("Location: gig.php?error=User Type is required");
	    exit();
	}
    else if (empty($price)) {
		header("Location: gig.php?error=Email is required");
	    exit();
	}else if(empty($skills)){
        header("Location: gig.php?error=Password is required");
	    exit();
	}
    else if(empty($features)){
        header("Location: gig.php?error=User Type is required");
	    exit();
	}
    else{
	
        $sql7 = "SELECT * FROM developers WHERE email='$usermail'";
		$result7 = mysqli_query($conn, $sql7);
		$row = mysqli_fetch_assoc($result7);
		$devtype = $row['developer_type'];
		$sql2 = "INSERT INTO gig(name, email, number, price, skills, features,user_id, developer_type) VALUES('$name','$email', '$number', '$price', '$skills','$features','$user_id','$devtype')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: gig.php?success=Your Gig has been created successfully");
	         exit();
           }else {
	           	header("Location: gig.php?error=unknown error occurred");
		        exit();
           }
	}
	
}else{
	header("Location: gig.php");
	exit();
}
