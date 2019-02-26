<?php

session_start();

if(isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$uid= mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd= mysqli_real_escape_string($conn, $_POST['pwd']);

	//ERROR HANDLERS
	//CHECK if inputs are empty
	if(empty($uid)||empty($pwd)){
		header("Location: ../index.php?login=empty");
		exit();
	} else{
		$sql = "SELECT * FROM student WHERE Username = '$uid';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck <1){
			header("Location: ../index.php?login=error");
			exit();
		} else{
			if ($row =mysqli_fetch_assoc($result)) {
				//DE-HASHING the password
				$hashedPwdCHeck = password_verify($pwd,$row['Password']);
				if($hashedPwdCHeck==false) {
				//if($pwd != $row['Password']){
					header("Location: ../index.php?login=error");
					exit();
				}elseif ($hashedPwdCHeck==true) {
				//} elseif ($pwd==$row['Password']) {
					//for not using hashing // the elseif condition and un // in the comment
					//Log in the user here
					$_SESSION['u_roll']=$row['RollNo'];
					$_SESSION['u_first']=$row['FirstName'];
					$_SESSION['u_last']=$row['LastName'];
					$_SESSION['u_year']=$row['BatchYear'];
					$_SESSION['u_branch']=$row['Department'];
					$_SESSION['u_email']=$row['Email'];
					$_SESSION['u_uid']=$row['Username'];
						header("Location: ../index.php?login=success");
						exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}	
