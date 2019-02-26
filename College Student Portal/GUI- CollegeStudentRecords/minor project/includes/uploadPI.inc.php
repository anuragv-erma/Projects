<?php
session_start();
if (isset($_POST['pi_submit'])){

	include_once 'dbh.inc.php';

	$mob_no = mysqli_real_escape_string($conn, $_POST['mobno']);
	$adress = mysqli_real_escape_string($conn, $_POST['address']);
	$_SESSION['up_mob_no']=$mob_no;
	$_SESSION['up_adress']=$adress;

	if(empty($mob_no)||empty($adress)){
		header("Location: ../uploadPI.php?empty_fields");
		exit();

	} else{ 
		if($mob_no>=1000000000 && $mob_no<=9999999999){
		//$sql = "INSERT INTO personal_info (RollNo, FirstName, LastName, Mob_No, Address) VALUES ('$_SESSION[up_roll]', '$_SESSION[up_first]', '$_SESSION[up_last]','$mob_no', '$adress' );";
		//mysqli_query($conn,$sql) or die();
		header("Location: ../uploadbiodata.php");
		exit();
	} else{
		header("Location: ../uploadPI.php?invalid");
		exit();
	}
}
}		
