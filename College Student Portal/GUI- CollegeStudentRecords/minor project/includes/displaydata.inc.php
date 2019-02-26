<?php
	include_once 'dbh.inc.php';
	$sql="SELECT  * FROM Student WHERE RollNo='$_SESSION[u_roll]';";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	echo $_SESSION['u_roll'];
?>