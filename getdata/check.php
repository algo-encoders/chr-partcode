<?php
	include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];

	$category = $_POST['category'];
	$model = $_POST['model'];
	$part= $_POST['part'];
	$remarks = $_POST['remarks'];


	$check="Select * From part Where Category='$category' and Model='$model' and PartName='$part'";
		$checkrun=mysqli_query($conn,$check);
		$checkrow=mysqli_num_rows($checkrun);
		if($checkrow>0){
			echo 1;
		}
		else
		{
			echo 0;
		}

?>