<?php

session_start();
include 'dbh.inc.php';

if(isset($_POST['submitadmin'])) {

	$uid= mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd= mysqli_real_escape_string($conn, $_POST['pwd']);

	//ERROR HANDLERS
	//CHECK if inputs are empty
	if(empty($uid)||empty($pwd)){
		header("Location: ../adminlogin.php?login=empty2");
		exit();
	} else{
		if($uid!="admin"||$pwd!="root") {
			header("Location: ../adminlogin.php?login=error1");
			exit();
		} else{
			$_SESSION['a_uid']=$uid;
			header("Location: ../signup.php?login=success");
			exit();
		}
	}	
} else {
	header("Location: ../adminlogin.php?login=error");
	exit();
}	
	