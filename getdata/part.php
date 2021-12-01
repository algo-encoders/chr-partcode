<?php
		
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];

$output="";

$cat=$_POST['category'];

$output='<option value=""> Select Part Name </Option>';

$query="Select * from partname where Cat='$cat' order by PartName ASC";

$run=mysqli_query($conn,$query);

while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showNickName=$row[1];
					$showPartName=$row[2];
					$showCat=$row[3];
					$showdate=$row[4];
					$showuser=$row[5];
$output .= '<option value="'.$showNickName.'">'.$showPartName.'</option>';
}
echo $output;
					



?>