<?php
session_start();
if (isset($_POST['bi_submit'])){

	include_once 'dbh.inc.php';

	$bm = mysqli_real_escape_string($conn, $_POST['bm']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$bg = mysqli_real_escape_string($conn, $_POST['bg']);
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$weight = mysqli_real_escape_string($conn, $_POST['weight']);

	if(empty($bm)||empty($weight)||empty($gender)||empty($dob)||empty($age)||empty($height)){
		header("Location: ../uploadbiodata.php?empty_fields");
		exit();

	} else{
		if($gender!='M'&&$gender!='F') {
			header("Location: ../uploadbiodata.php?invalid");
			exit();
		} else{ 
			if($height<=0||$weight<=0){
				header("Location: ../uploadbiodata.php?invalid");
				exit();
			} else{
			$sql = "INSERT INTO student(RollNo, BatchYear, Department, Program, Username, Email, FirstName, LastName, Password) VALUES ('$_SESSION[up_roll]', '$_SESSION[up_year]', '$_SESSION[up_branch]', '$_SESSION[up_prog]', '$_SESSION[up_uid]', '$_SESSION[up_email]', '$_SESSION[up_first]', '$_SESSION[up_last]', '$_SESSION[up_hashedpwd]=;');";
			mysqli_query($conn, $sql) or die();
		$sql = "INSERT INTO personal_info (RollNo, FirstName, LastName, Mob_No, Address) VALUES ('$_SESSION[up_roll]', '$_SESSION[up_first]', '$_SESSION[up_last]','$_SESSION[up_mob_no]', '$_SESSION[up_adress]' );";
		mysqli_query($conn,$sql) or die();	
		$sql = "INSERT INTO biodata (RollNo, FirstName, LastName, Birthmark, Gender, DOB,Blood_Gp, Age, Height, Weight) VALUES ('$_SESSION[up_roll]', '$_SESSION[up_first]', '$_SESSION[up_last]','$bm', '$gender', '$dob','$bg', '$age', '$height', '$weight' );";
		mysqli_query($conn,$sql) or die();
		header("Location: ../signup.php?success");
		exit();
	}
}
}
}		