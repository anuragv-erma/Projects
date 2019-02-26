<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Student Portal: Courses Information</h2>
	</div>
	<div> 
		<?php
		include_once 'includes/dbh.inc.php';
		$sem=1;
		$sqlc="SELECT * FROM courses WHERE RollNo='$_SESSION[u_roll]' AND Semester=$sem ORDER BY Semester ASC;";
		$resultc=mysqli_query($conn,$sqlc);
		$resultc2=mysqli_query($conn,$sqlc);
		$resultCheckc=mysqli_num_rows($resultc);
		if($resultCheckc>0){
			echo "You are currently registered for the following courses ".$_SESSION['u_first']." ".$_SESSION['u_last'].":-<br>";
		
			$sqlc2="SELECT *
					FROM courses a
					INNER JOIN (
   					 	SELECT RollNo, MAX(Semester) Semester
    					FROM courses
    					GROUP BY RollNo
					) b ON a.RollNo = b.RollNo AND a.Semester = b.Semester";
			$resultc3=mysqli_query($conn,$sqlc2);
			$rowc3=mysqli_fetch_assoc($resultc3);
			$sqlc="SELECT * FROM courses WHERE RollNo='$_SESSION[u_roll]' AND Semester=$rowc3[Semester] ORDER BY Semester ASC;";
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
	} else {
		echo "No Course information available!";
	}
		?></div>

</section>


<?php
	include_once 'footer.php';
?>