<?php 
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Welcome <?php echo $user?></title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	

</head>
<body>
<?php
	include('connection.php');
				$getid=Null;
				if(isset($_GET['del'])){$getid=$_GET['del'];}
				
					
		$sql = "Delete From model where ID='$getid'";
		
		$insert=mysqli_query($conn,$sql);
		if($insert){
			echo "<script>window.alert('One Record Deleted Successfully')
			window.location.replace(\"http://localhost/cc/addmodel.php\");
			</script>";
				
		}
		
		
?>
			
				

	<div ID="footer">

</div>

</body>
</html>