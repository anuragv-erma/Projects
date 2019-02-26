<?php
	include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Welcome to the Student Portal</h2>
		<?php
			if(isset($_SESSION['u_roll'])){
				echo "You  are logged in ".$_SESSION['u_first']." ".$_SESSION['u_last']."!";
				include_once 'includes/loggedin.inc.php';	
			}
			?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>