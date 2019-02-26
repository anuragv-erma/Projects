<?php
session_start();
if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$roll = mysqli_real_escape_string($conn, $_POST['roll']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);
	$branch = mysqli_real_escape_string($conn, $_POST['branch']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$prog=mysqli_real_escape_string($conn, $_POST['program']);
	$_SESSION['up_roll']=$roll;
	$_SESSION['up_first']=$first;
	$_SESSION['up_last']=$last;
	$_SESSION['up_year']=$year;
	$_SESSION['up_branch']=$branch;
	$_SESSION['up_email']=$email;
	$_SESSION['up_uid']=$uid;
	$_SESSION['up_pwd']=$pwd;
	$_SESSION['up_prog']=$prog;
	//Error handlers
	//Check for empty fields
	if(empty($first)||empty($last)||empty($roll)||empty($year)||empty($branch)||empty($email)||empty($uid)){
		header("Location: ../signup.php?signup=empty");
		exit();

	} else{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first)||!preg_match("/^[1-8]*$/", $year)||!preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else{
			//Check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM student WHERE Username = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck>0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else{
					//HASHING THE PASSWORD
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					$_SESSION['up_hashedpwd']=$hashedPwd;
					//INSERT THER USER INTO THE DATABASE
					//$sql = "INSERT INTO student(RollNo, BatchYear, Department, Program, Username, Email, FirstName, LastName, Password) VALUES ('$roll', '$year', '$branch', '$prog', '$uid', '$email', '$first', '$last', '$hashedPwd');";
					//for not using hashing change hasedPwd to pwd above
					
					//mysqli_query($conn, $sql) or die();

					header("Location: ../uploadPI.php?success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../signup.php");
	exit();
}