<?php

$host="Localhost";
$user="root";
$pass="";
$db="store";

/*$host="sql108.epizy.com";
$user="epiz_22046062";
$pass="jaki4085";
$db="epiz_22046062_store";*/

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
	echo "Not Connected to server";
	}
?>