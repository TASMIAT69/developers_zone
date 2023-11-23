<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['fullname']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['number']) && isset($_POST['developer_type'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fullname = validate($_POST['fullname']);
	$email = validate($_POST['email']);

	$password = validate($_POST['password']);
	$number = validate($_POST['number']);
    $developer_type = validate($_POST['developer_type']);

	$user_data = 'fullname='. $fullname. '&email='. $email;


	if (empty($fullname)) {
		header("Location: signup2.php?error=Full Name is required&$user_data");
	    exit();
	}else if(empty($email)){
        header("Location: signup2.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($password)){
        header("Location: signup2.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($number)){
        header("Location: signup2.php?error=Number is required&$user_data");
	    exit();
	}


	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE email='$email' AND type ='developer' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The E-mail is taken try another&$user_data");
	        exit();
		}
        $sql3 = "SELECT * FROM users WHERE number='$number' AND type='developer' ";
		$result3 = mysqli_query($conn, $sql3);

		if (mysqli_num_rows($result3) > 0) {
			header("Location: signup2.php?error=The Phone Number is taken try another&$user_data");
	        exit();
		}
        
        else {
           $sql2 = "INSERT INTO users(fullname, email, number, password, type) VALUES('$fullname','$email', '$number', '$password', 'developer')";
           $sql4 = "INSERT INTO developers(fullname, email, number, password, developer_type) VALUES('$fullname','$email', '$number', '$password', '$developer_type')";
           $result2 = mysqli_query($conn, $sql2);
           $result4 = mysqli_query($conn, $sql4);
           if ($result2 && $result4) {
           	 header("Location: login.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup2.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup2.php");
	exit();
}