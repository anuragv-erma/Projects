
<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Student Portal: Personal Information</h2>
	</div>
	<div> 
		<?php
		include_once 'includes/dbh.inc.php';
		$sqlp="SELECT * FROM personal_info WHERE RollNo='$_SESSION[u_roll]';";
		$resultp=mysqli_query($conn,$sqlp);
		$resultCheckp=mysqli_num_rows($resultp);
		if($resultCheckp>0){
			echo "Your personal information is as follows ".$_SESSION['u_first']." ".$_SESSION['u_last'].":-<br>";
			while($rowp=mysqli_fetch_assoc($resultp)){
				echo "<br>Mobile No. :- &nbsp;&nbsp;&nbsp;".$rowp['Mob_No'];
				echo "<br>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowp['Address'];
			}
		}
		else{
			echo 'You have no personal information';
		}
		?></div>

</section>


<?php
	include_once 'footer.php';
?>