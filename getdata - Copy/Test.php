<?php
include("connection.php");

$check="Select * From part Where Category='FPTV' and Model='18I' and PartName='PCB'";
		$checkrun=mysqli_query($conn,$check);
		$checkrow=mysqli_num_rows($checkrun);
	echo $checkrow;
		if($checkrow>0){

			echo "<script>var check=confirm('Duplicate Data! Click OK To Add')</script>";
		}
		echo "<br>test ok";

?>