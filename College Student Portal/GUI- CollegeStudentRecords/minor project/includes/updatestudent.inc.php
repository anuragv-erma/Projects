<?php
session_start();
if (isset($_POST['u_submit'])){

	include_once 'dbh.inc.php';

	//$_SESSION['uproll'] = mysqli_real_escape_string($conn, $_POST['up_roll']);
	$_SESSION['uproll'] = $_POST['up_roll'];

	//Error handlers
	//Check for empty fields
	if(empty($_SESSION['uproll'])){
		header("Location: ../updatestudent.php?error_rollno=empty");
		exit();

	} else{
		//Check if input characters are valid
		if (!preg_match("/^[0-9]*$/", $_SESSION['uproll'])) {
			header("Location: ../updatestudent.php?error_rollno=invalid");
			exit();
		} else {
			$usql = "SELECT * FROM student WHERE RollNo = '$_SESSION[uproll]'";
			$uresult = mysqli_query($conn, $usql);
			$uresultCheck = mysqli_num_rows($uresult);

			if($uresultCheck<1) {
				header("Location: ../updatestudent.php?error=roll_no_does_not_exist");
				exit();
			} else{
				header("Location: ../updatestudent.php?success");
				exit();
			}
		}
	}
}				
				