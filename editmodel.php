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
				$showid=Null;
				$showcode=Null;
				$showmodel=Null;
				$showcategory=Null;
				if(isset($_GET['edit'])){$getid=$_GET['edit'];}
				$query="Select * from model Where ID='$getid'";
				$run=mysqli_query($conn,$query);
				$rows=mysqli_num_rows($run);
				
				
				
				while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcategory=$row[1];
					$showmodel=$row[2];
					$showcode=$row[3];
					$showdate=$row[4];
					$showuser=$row[5];
				}

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CHR Store Part No. Genrator</a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="adduser.php">Add User</a></li> 
		<li class="active"><a href="#">Login</a></li>
	    <li><a href="Logout.php">Logout</a></li>
	</ul>
  </div>
</nav>

  <h2>Enter Part Details:</h2>
  
  <form action="editmodel.php?editdata=<?php echo $showid;?>" Method="Post">
    <div class="form-group">
     
      <div class="col-xs-4">
        <label>Product</label>
		<select name="category" class="form-control" value="<?php echo $showcategory;?>" required>
			<option value="">Select Product</option>
			<option value="AC"<?php if($showcategory=="AC"){echo "Selected";}?>>AC</option>
			<option value="AS"<?php if($showcategory=="AS"){echo "Selected";}?>>AS</option>
			<option value="FPTV"<?php if($showcategory=="FPTV"){echo "Selected";}?> >FPTV</option>
			<option value="REF" <?php if($showcategory=="REF"){echo "Selected";}?>>REF</option>	
			<option value="WD" <?php if($showcategory=="WD"){echo "Selected";}?>>WD</option>		
		</select>
      </div>
      <div class="col-xs-4">
        <label>Model No.</label>
        <input name="model" class="form-control" type="text" value="<?php echo $showmodel;?>" required>
      </div>
	  <div class="col-xs-4">
        <label>Model Code</label>
        <input name="code" class="form-control" type="text" value="<?php echo $showcode;?>" required>
      </div>
	  
	  <div class="col-xs-6">
        <label></label>        
      </div>
	  <label></label>
	  <div class="container" style="Margin:10px">
	  <input type="Submit" class="btn btn-primary" Name="Submit" Value="Update"/>
		</div>
	</div>
  </form>
</div>

<?php
			
			$category=Null;
			$model=Null;
			$code=Null;
			$editdata=Null;
		
			$user=$_SESSION['login_user'];
			
			if(isset($_GET['editdata'])){$editdata=$_GET['editdata'];}
			if(isset($_POST['category'])){$category = $_POST['category'];}
			if(isset($_POST['model'])){$model= $_POST['model'];}
			if(isset($_POST['code'])){$code = $_POST['code'];}
			
		$sql = "UPDATE `model` SET `Category` = '$category', `Model` = '$model', `ModelCode` = '$code', `Date` = NOW(), `user` = '$user' WHERE `model`.`ID` = '$editdata';";
		if($category != Null){
		$insert=mysqli_query($conn,$sql);
		if($insert){
			echo "<script>window.alert('Record Updated Succefully')
			window.location.replace(\"http://localhost/cc/addmodel.php\");
			</script>";
				
		}}
		
		
?>
			
				

	<div ID="footer">

</div>

</body>
</html>