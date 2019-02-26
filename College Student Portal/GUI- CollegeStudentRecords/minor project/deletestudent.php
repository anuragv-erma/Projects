<?php
	include_once 'adminheader.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Welcome to the Student Portal: Administrator Section</h2>
		Enter the roll number of the student:-
		<?php
			if(isset($_SESSION['a_uid'])){
				echo '<form class="signup-form" action="includes/deletestudent.inc.php" method="POST">
						<input type="text" name="d_roll" placeholder="Roll Number">
						<button type="submit" name="d_submit">Submit</button>
						</form>';

			}
			?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>