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
				<li><a href="adminlogin.php">HOME</a>
				</li>
			</ul>
			<div class="nav-login">
				<?php
				if (isset($_SESSION['a_uid'])) {
					echo '<form action="includes/logout.inc.php" method="POST">
						<button type="submit" name="submit">Logout</button>
						</form>';
				} else{
					echo '<form action="includes/adminlogin.inc.php" method="POST">
						<input type="text" name="uid" placeholder="Username">
						<input type="password" name="pwd" placeholder="Password">
						<button type ="submit" name="submitadmin">Login</button>
						</form>';
				}
				?>
			</div>
		</div>
</header>