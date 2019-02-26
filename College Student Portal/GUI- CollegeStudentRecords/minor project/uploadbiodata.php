<?php
	include_once 'adminheader.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		Enter the Bio Data of Student:<br/>
		<form class="signup-form" action="includes/uploadbiodata.inc.php" method="POST">
			<input type="text" name="bm" placeholder="Birth Mark">
			<input type="text" name="gender" placeholder="Gender">
			<input type="text" name="dob" placeholder="Date of Birth(YYYY-MM-DD)">
			<input type="text" name="age" placeholder="Age">
			<input type="text" name="bg" placeholder="Blood Group">
			<input type="text" name="height" placeholder="Height(cms)">
			<input type="text" name="weight" placeholder="Weight(kgs)">
			<button type="submit" name="bi_submit">Submit</button>
		</form>


	</div>
</section>

<?php
	include_once 'footer.php';
?>