<?php

include 'dbh.inc.php';

$sqll = "SELECT * FROM student WHERE RollNo='$_SESSION[u_roll]';";
$resultl = mysqli_query($conn, $sqll);
$rowl=mysqli_fetch_assoc($resultl);
echo "<br><br><br>Roll No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowl['RollNo'];
echo "<br>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowl['FirstName'].$rowl['LastName'];
echo "<br>Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowl['Department'];
echo "<br>Batch Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowl['BatchYear'];
echo "<br>Program&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rowl['Program'];
?>