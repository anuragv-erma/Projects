<?php
	include_once 'adminheader.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		Enter the Personal Information of Student:<br/>
		<form class="signup-form" action="includes/uploadPI.inc.php" method="POST">
			<input type="text" name="mobno" placeholder="Mobile No.">
			<input type="text" name="address" placeholder="Address">
			<button type="submit" name="pi_submit">Submit</button>
		</form>


	</div>
</section>

<?php
	include_once 'footer.php';
?>