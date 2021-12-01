<!DOCTYPE html>
<html>
<head>
<?php 
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];
	
	$adminqry="Select * From user WHERE User='$user' AND Type='Admin'";
	$adminrun=mysqli_query($conn,$adminqry);
	$adminrows=mysqli_num_rows($adminrun);
	if($adminrows==0){
		
		header("Location:logout.php");
		
	}
	
?>



	<!-- <meta charset="UTF-8">
	<meta name="viewport" Content="width=device-width, initial-scale=1.0">-->
	<title>Welcome <?php echo $user?></title>
	<link rel="stylesheet" type="text/css" href="style/style.css"></link>
	<!-- <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css"></link>
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap-theme.min.css"></link>
	<style>body{padding-top:50px}.starter-template{40px 15px; text-align:center;}</style> -->

</head>
<body>
<?php
	include('connection.php');
?>
<div Id="header">
<h1>Changhong Ruba CC Inbound & Outbound</h1>

</div>

<div Id="nav">
<ul>
  <li><a href="http://116.58.45.67/e" target="Blank">Open CMS</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div>

<div Id="section">
<h3> <font Color="Purple" face="Comic Sans MS">Please Enter User Detail</font></h3>
			<form action="adduser.php" method="Post">
			<table><tr><td>
			<font Color="Black" face="Comic Sans MS">User Type:</font></td>
			<td>
			<select Name="usertype">
							<option value="type">Select Type</option>
							<option value="Admin">Admin</option>
							<option value="CRO">CRO</option>
			</select></td></tr>
						<tr><td><font Color="Black" face="Comic Sans MS">User Name:</font></td>
						<td><input type="text" Name="username"></input></td></tr><br>
						
						<tr><td><font Color="Black" face="Comic Sans MS">Password:</font></td>
						<td><input type="Password" Name="pass"></input></td></tr>
					
						<tr><td><font Color="Black" face="Comic Sans MS">Confirm Password:</font></td>
						<td><input type="Password" Name="repass"></input></td></tr>
					
						
			</table>
			<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						<Input type="Submit" Name="Submit" Value="Add User" class="button">
			</form><br>
			
			
			
</div>

	






<?php
			$user=$_SESSION['login_user'];
			$usertype=Null;
			$username=Null;
			$pass=Null;
			$repass=Null;
			$submit=Null;
			$pass1=Null;
			
		if(isset($_POST['usertype'])){
		
			$usertype=$_POST['usertype'];
			$username=$_POST['username'];
			$pass=$_POST['pass'];
			$repass=$_POST['repass'];
			if ($pass==$repass){
			$pass1=$pass;}
			
			Else
			{	
			
			echo"Password not Match";
			
			}
			
			
				
		}
				
		
		$sql = "INSERT INTO user (User,password,type) 
		VALUES ('$username','$pass1','$usertype')";
		if(($usertype=="Admin" || $usertype=="CRO") ){
		$insert=mysqli_query($conn,$sql);
		
		if($insert){
			echo "<h1><font color=#800080>User Register Successfully</font></h1>";
		
		}
		}
		
		
?>

	<div ID="footer">
Copyright 	&copy; Changhong Ruba AFS Call Center
</div><br><br>

</body>
</html>