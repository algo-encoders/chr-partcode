<?php
		
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];

$output="";
$category = $_POST['category'];
$model = $_POST['model'];
$part= $_POST['part'];
$remarks = $_POST['remarks'];
/*$category="FPTV";
$model="18K";
$part="COMP";
$remarks="This is Test Data";*/
$partcode=Null;
$partnumber=Null;
$user=$_SESSION['login_user'];



$maxPartQry="Select max(PartCode) FROM part";
		$maxPartRun=mysqli_query($conn,$maxPartQry);
		$maxpart=mysqli_fetch_array($maxPartRun);
		$partcode=$maxpart[0]+1;
		$invID = str_pad($partcode,6,'0', STR_PAD_LEFT);
		$partnumber=$model."-".$part."-".$invID;
		$product;
		echo $partnumber;



		$sql = "INSERT INTO `part` (`ID`, `PartCode`, `PartNumber`, `Category`, `Model`, `PartName`, `Remarks`, `Date`, `Name`) 
		VALUES (NULL, '$partcode', '$partnumber', '$category', '$model', '$part','$remarks', NOW(), '$user');";
		if(($category != Null) ){
		$insert=mysqli_query($conn,$sql);
		}
		if($insert){
			
		echo "<script>window.alert(New Part No. (".$partnumber.") is Genrated Successfully!)</script>";
		}
		


?>