<?php 
session_start(); 
include "db_connect.php";

if (isset($_POST['fname']) && isset($_POST['ptype']) && isset($_POST['ynumber']) && isset($_POST['dnumber']) && isset($_POST['amount']) && isset($_POST['trxid']) ) {
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
	$name = validate($_POST['fname']);
	$ptype = validate($_POST['ptype']);
    $ynumber = validate($_POST['ynumber']);
    $dnumber = validate($_POST['dnumber']);
	$amount = validate($_POST['amount']);
    $trxid = validate($_POST['trxid']);
    $user_id = $_POST['developer_id'];
	$user_id2 = $_SESSION['user_id'];
    $usermail = $_SESSION['email'];


	if (empty($name)) {
		header("Location: payment.php?error=Your name is required");
	    exit();
	}else if(empty($ptype)){
        header("Location: payment.php?error=P ayment method is required");
	    exit();
	}
    else if(empty($ynumber)){
        header("Location: payment.php?error= Your Number is required");
	    exit();
	}
    else if(empty($dnumber)){
        header("Location: payment.php?error= Your Developer Number is required");
	    exit();
	}
    else if(empty($amount)){
        header("Location: payment.php?error= Your Amount is required");
	    exit();
	}
    else if (empty($trxid)) {
		header("Location: payment.php?error=Transaction Id is required");
	    exit();
	}
    else{
      
		$sql2 = "INSERT INTO orders(name, ptype, ynumber, dnumber, amount, trxid, developer_id, user_id, client_mail, status) VALUES('$name','$ptype', '$ynumber', '$dnumber', '$amount','$trxid','$user_id', '$user_id2','$usermail','pending')";
           $result2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
          
           if ($result2) {
           	 header("Location: orders.php?success=Your Gig has been created successfully");
	         exit();
           }else {
	           	header("Location: payment.php?error=unknown error occurred");
		        exit();
           }
	}
	
}else{
	header("Location: dashboard.php");
	exit();
}
