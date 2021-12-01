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

$output='<option value=""> Select Model No. </Option>';

$query="Select * from model where Category='$cat' order by Model ASC";

$run=mysqli_query($conn,$query);

while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcategory=$row[1];
					$showcode=$row[2];
					$showmodel=$row[3];
					$showdate=$row[4];
					$showuser=$row[5];
$output .= '<option value="'.$showcode.'">'.$showmodel.'</option>';
}
echo $output;
					



?>