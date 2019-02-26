<?php
	
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type ="text/css" href="style.css">
</head>
<body>
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">HOME</a>
					<?php
					if(isset($_SESSION['u_roll'])){
					echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="academics.php">Academics</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="biodata.php">Biodata</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="courses.php">Courses</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="personal_info.php">Personal Info</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="fees.php">Fees</a>';
				}
				?>
				</li>
			</ul>
			<div class="nav-login">
				<?php
				if (isset($_SESSION['u_roll'])) {
					echo '<form action="includes/logout.inc.php" method="POST">
						<button type="submit" name="submit">Logout</button>
						</form>';
				} else{
					echo '<form action="includes/login.inc.php" method="POST">
						<input type="text" name="uid" placeholder="Username">
						<input type="password" name="pwd" placeholder="Password">
						<button type ="submit" name="submit">Login</button>
						</form>
						<a href="adminlogin.php">Add Student</a>';
				}
				?>
			</div>
		</div>
</header>