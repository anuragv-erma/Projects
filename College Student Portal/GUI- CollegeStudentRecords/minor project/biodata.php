
<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Student Portal: Biodata Information</h2>
	</div>
	<div> 
		<?php
		include_once 'includes/dbh.inc.php';
		$sqlb="SELECT * FROM biodata WHERE RollNo='$_SESSION[u_roll]';";
		$resultb=mysqli_query($conn,$sqlb);
		$resultCheckb=mysqli_num_rows($resultb);
		if($resultCheckb>0){
			echo "Your biodata information is as follows ".$_SESSION['u_first']." ".$_SESSION['u_last'].":-<br>";
			while($rowb=mysqli_fetch_assoc($resultb)){
				echo "<br>Birthmark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :- &nbsp;&nbsp;&nbsp;&nbsp;".$rowb['Birthmark'];
				echo "<br>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowb['Gender'];
				echo "<br>Date of Birth :- &nbsp;&nbsp;&nbsp;".$rowb['DOB'];
				echo "<br>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowb['Age'];
				echo "<br>Blood Group :- &nbsp;&nbsp;&nbsp;".$rowb['Blood_Gp'];
				echo "<br>Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowb['Height'];
				echo "<br>Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowb['Weight'];
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