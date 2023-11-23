<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['id']) && isset($_POST['status'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id = validate($_POST['id']);
	$status = validate($_POST['status']);



	if (empty($id)) {
		header("Location: devorder.php?error=Order id is required");
	    exit();
	}else if(empty($status)){
        header("Location: devorder.php?error=Put your Status is required");
	    exit();
	}
	
	else{

           $sql2 = "UPDATE orders SET status='$status' WHERE order_id = '$id'";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: devorder.php?success=Your Order Status Updated successfully");
	         exit();
           }else {
	           	header("Location: devorder.php?error=unknown error occurred");
		        exit();
           }
	
	}
	
}else{
	header("Location: orders.php");
	exit();
}