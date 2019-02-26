<?php

if (isset($_POST['d_submit'])){

	include_once 'dbh.inc.php';

	$droll = mysqli_real_escape_string($conn, $_POST['d_roll']);

	//Error handlers
	//Check for empty fields
	if(empty($droll)){
		header("Location: ../deletestudent.php?error_rollno=empty");
		exit();

	} else{
		//Check if input characters are valid
		if (!preg_match("/^[0-9]*$/", $droll)) {
			header("Location: ../deletestudent.php?error_rollno=invalid");
			exit();
		} else {
			$dsql = "SELECT * FROM student WHERE RollNo = '$droll'";
			$dresult = mysqli_query($conn, $dsql);
			$dresultCheck = mysqli_num_rows($dresult);

			if($dresultCheck<1) {
				header("Location: ../deletestudent.php?error=roll_no_does_not_exist");
				exit();
			} else{
				$dsql2="DELETE FROM student WHERE RollNo=$droll;";
				mysqli_query($conn, $dsql2);
				header("Location: ../deletestudent.php?signup=success");
				exit();
			}
		}
	}
}			