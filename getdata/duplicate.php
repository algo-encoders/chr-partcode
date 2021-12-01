<?php
		
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];

$output="";


$model=$_POST['Model'];
$part=$_POST['Part'];
$vendor=$_POST['vendor'];

if($model==Null||$part==Null){
	$output="<script>
$(document).ready(function(){
$('#close').click(function(){
    $('#x').hide();
});
});
</script><div id='x' class='container alert alert-warning'>Please Fill All Required Fields!!!<span class=' pull-right' id='close'><i class='fa fa-times' aria-hidden='true'></i></span></div>";
}
else {
	





$query="Select * from part where Model='$model' AND PartName='$part'";

$run=mysqli_query($conn,$query);
$row=mysqli_num_rows($run);

if($row>0){
$output="<script>
$(document).ready(function(){
$('#close').click(function(){
    $('#x').hide();
});
});
</script><div id='x' class='container alert alert-danger'>Duplicate Data Found Please Check Your Data!!!<span class=' pull-right' id='close'><i class='fa fa-times' aria-hidden='true'></i></span></div>";
}
elseif($row==0){
$output="
<script>
$(document).ready(function(){
$('#close').click(function(){
    $('#x').hide();
});
});

<div id='x' class='container alert alert-success'>Record Is OK!!!<span class=' pull-right' id='close'><i class='fa fa-times' aria-hidden='true'></i></span></div>";
}
}

echo $output;
					



?>