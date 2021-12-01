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
				$shownumber=Null;
				$showpart=Null;
				$showvendor=Null;
				$showremarks=Null;





				if(isset($_GET['id'])){$getid=$_GET['id'];}
				$query="Select * from part Where ID='$getid'";
				$run=mysqli_query($conn,$query);
				$rows=mysqli_num_rows($run);
				
				
				
				while ($row=mysqli_fetch_array($run)){
					$showid=$row['ID'];
					$showcode=$row['PartCode'];
					$shownumber=$row['PartNumber'];
					$showvendor=$row['Vendor'];
					$showcategory=$row['Category'];
					$showmodel=$row['Model'];
					$showpart=$row['PartName'];
					$showremarks=$row['Remarks'];
					$showdate=$row['Date'];
					$showuser=$row['Name'];

					

				}


				


?>
	
	
	
	
	
	

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="store.php">CHR Store Part No. Genrator</a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="addmodel.php">New Model</a></li> 
		<li><a href="adduser.php">Add User</a></li> 
		<li class="active"><a href="#">Login</a></li>
	    <li><a href="Logout.php">Logout</a></li>
	</ul>
  </div>
</nav>

  <h2>Enter Part Details:</h2>
  
  <form action="editstore.php?id=<?php echo $showid?>" Method="Post">
    <div class="form-group">

    <div class="col-xs-3">
        <label>Part Code</label>
        <input name="partcode" class="form-control" type="text" value="<?PHP echo $shownumber?>"  required>
    </div>

    <div class="col-xs-2">
        <label>Category</label>
        <input name="category" class="form-control" type="text" value="<?PHP echo $showcategory?>"  required>
    </div>


      <div class="col-xs-2">
        <label>Model Number</label>
        <input name="model" class="form-control" type="text" value="<?PHP echo $showmodel?>"  required>
      </div>


      <div class="col-xs-2">
        <label>Part Name</label>
        <input name="part" class="form-control" type="text" value="<?PHP echo $showpart?>"  required>
      </div>


	  <div class="col-xs-3">
        <label>Vendor</label>
        <input name="vendor" class="form-control" type="text" value="<?PHP echo $showvendor?>" >
      </div>


	  <div class="col-xs-6">
        <label>Remarks</label>
        <input type="text" name="remarks" class="form-control" value="<?PHP echo $showremarks?>"  rows="3">
      </div>

	  <div class="col-xs-6">
	  <label></label>
	  <div class="container" style="Margin:10px">
	  <input type="Submit" class="btn btn-primary" Name="Submit" Value="Update"/>
		</div>
	</div>
  </form>
</div>


<?php
			//insert data to database
			
			$category=Null;
			$model=Null;
			$part=Null;
			$remarks=Null;
			$partcode=Null;
			$vendor=Null;
			$user=$_SESSION['login_user'];
			
			
			if(isset($_POST['category'])){$category = $_POST['category'];}
			if(isset($_POST['model'])){$model = $_POST['model'];}
			if(isset($_POST['part'])){$part= $_POST['part'];}
			if(isset($_POST['vendor'])){$vendor= $_POST['vendor'];}
			if(isset($_POST['remarks'])){$remarks = $_POST['remarks'];}
		

		
		$invID = str_pad($showcode,6,'0', STR_PAD_LEFT);
		$partnumber=$model."-".$part."-".$invID;
		$product;

		
		//Insert Query For inserting data in DB
		$sql = "update `part` set `PartNumber`= '$partnumber', `Vendor`= '$vendor', `Category`= '$category', `Model`= '$model', `PartName`= '$part', `Remarks`='$remarks' where ID=$showid;";
		
		if(isset($_POST['Submit'])){
		$insert=mysqli_query($conn,$sql);
		
		if($insert){
			echo "<script>window.alert('Data Updated Done!!!!')</script>";
		
		}
		}
		
	?>


			
			
			
		
		
			
			
		

	<div ID="footer">

</div>

</body>
</html>