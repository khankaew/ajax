<?php 
 	include("condb.php");
 
	$id =$_REQUEST["district_id"];
	
 	$sql2 = "SELECT * FROM  districts WHERE province_id = '$id' "; 
	
 	$result2 = mysqli_query($con, $sql2); 
	
	while($row2 = mysqli_fetch_array($result2)) { 
	
	echo"<option value='$row2[0]'>" .$row2["name_in_thai"]." </option>";
	}
 ?>