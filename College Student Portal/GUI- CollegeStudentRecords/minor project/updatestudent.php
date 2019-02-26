<?php
	include_once 'adminheader.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Welcome to the Student Portal: Administrator Section</h2>
		
		<?php
			if(isset($_SESSION['a_uid'])){
				if(isset($_SESSION['uproll'])){
					echo 'Which record do you want to update?<br>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="upacademics.php">Academics</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="upbiodata.php">Biodata</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="upcourses.php">Courses</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="uppersonalinfo.php">Personal Info</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="upfees.php">Fees</a>';
				}	else{
						echo 'Enter the roll number of the student:-<form class="signup-form" action="includes/updatestudent.inc.php" method="POST">
						<input type="text" name="up_roll" placeholder="Roll Number">
						<button type="submit" name="u_submit">Submit</button>
						</form>';

				}
			}	
			?>

	</div>
</section>
<?php
	include_once 'footer.php';
?>