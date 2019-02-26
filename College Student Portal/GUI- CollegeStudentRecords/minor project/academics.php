<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Student Portal: Academic Information</h2>
	</div>
	<div> 
		<?php
		include_once 'includes/dbh.inc.php';
		$sqla="SELECT * FROM academics WHERE RollNo='$_SESSION[u_roll]';";
		$resulta=mysqli_query($conn,$sqla);
		$resultChecka=mysqli_num_rows($resulta);
		if($resultChecka>0){
			echo "Your academic information is as follows ".$_SESSION['u_first']." ".$_SESSION['u_last'].":-<br>";
			while($rowa=mysqli_fetch_assoc($resulta)){
				echo "<br>Semester :- &nbsp;&nbsp;&nbsp;".$rowa['Semester'];
				echo "<br>Year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowa['Year'];
				echo "<br>SPI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowa['SPI'];
				echo "<br>CPI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- &nbsp;&nbsp;&nbsp;".$rowa['CPI']."<br>";
				$sqlc="SELECT * FROM courses WHERE RollNo='$_SESSION[u_roll]' AND Semester=$rowa[Semester] ORDER BY Semester ASC;";
				$resultc=mysqli_query($conn,$sqlc);
				$resultc2=mysqli_query($conn,$sqlc);
				$resultCheckc=mysqli_num_rows($resultc);
				if($resultCheckc>0){
					while($rowc1=mysqli_fetch_assoc($resultc)){

						if($rowc1['Type']=='C'){
							echo "<br>Course Name :- ".$rowc1['Course Name'];
							echo "<br>Course Code &nbsp;:- ".$rowc1['Course Code'];
							echo "<br>Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc1['Type'];
							echo "<br>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc1['Semester'];
							echo "<br>Grade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc1['Grade'];
							echo "<br>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc1['Status']."<br>";
						}
					}	
					while($rowc2=mysqli_fetch_assoc($resultc2)){
						if ($rowc2['Type']=='E') {
							echo "<br>Course Name :- ".$rowc2['Course Name'];
							echo "<br>Course Code &nbsp;:- ".$rowc2['Course Code'];
							echo "<br>Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc2['Type'];
							echo "<br>Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc2['Semester'];
							echo "<br>Grade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc2['Grade'];
							echo "<br>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:- ".$rowc2['Status']."<br>";
					
						}
					}	
				}
				echo "<br><br><br><br><br><br><br><br>";
			}
		}
		else{
			echo 'You have no academic information';
		}
		?></div>

</section>


<?php
	include_once 'footer.php';
?>