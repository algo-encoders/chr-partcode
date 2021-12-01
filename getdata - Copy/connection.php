<?php
$host="Localhost";
$user="root";
$pass="";
$db="store";

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
	echo "Not Connected to server";
	}
?>