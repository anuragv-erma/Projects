<?php
	include_once 'adminheader.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Welcome to the Student Portal: Administrator Section</h2>
		<?php
			if(isset($_SESSION['a_uid'])){
				header("Location: signup.php?login=error");
						exit();

			}
			?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>