<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['type'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
    $type = validate($_POST['type']);

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}
    else if(empty($type)){
        header("Location: login.php?error=User Type is required");
	    exit();
	}
    else{
		// hashing the password
        $password = md5($password);

        
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND type='$type'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password && $row['type'] == $type) {
            	$_SESSION['user_type'] = $row['type'];
                $_SESSION['email'] = $row['email'];
            	$_SESSION['fullname'] = $row['fullname'];
            	$_SESSION['user_id'] = $row['user_id'];
            	header("Location: dashboard.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect email or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorrect email or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}
?>