<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Student Portal: Fees Information</h2>
	</div>
	<div> 
		<?php
		include_once 'includes/dbh.inc.php';
		$sqlf="SELECT * FROM fees WHERE RollNo='$_SESSION[u_roll]';";
		$resultf=mysqli_query($conn,$sqlf);
		$resultCheckf=mysqli_num_rows($resultf);
		if($resultCheckf>0){
			echo "Your academic information is as follows ".$_SESSION['u_first']." ".$_SESSION['u_last'].":-<br>";
			while($rowf=mysqli_fetch_assoc($resultf)){
				echo "<br>Transaction Id :- ".$rowf['Transaction_Id'];
				echo "<br>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowf['Date'];
				echo "<br>Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowf['Time'];
				echo "<br>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowf['Amount'];
				echo "<br>Method &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowf['Method']."<br>";
			}
		}
		?></div>

</section>


<?php
	include_once 'footer.php';
?>