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
	<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='deletemodel.php?delete_id='+id;
     }
}
</script>
	

</head>
<body>
<?php
	include('connection.php');

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Store.php">CHR Store Part No. Genrator</a>
    </div>
    <ul class="nav navbar-nav">
	    <li><a href="Logout.php">Logout</a></li>
	</ul>
  </div>
</nav>

  <h2>Enter Part Details:</h2>
  
  <form action="addmodel.php" Method="Post">
    <div class="form-group">
     
      <div class="col-xs-4">
        <label>Product</label>
		<select name="category" class="form-control" required>
			<option value="">Select Product</option>
			<option value="AC">AC</option>
			<option value="AS">AS</option>
			<option value="FPTV">FPTV</option>
			<option value="REF">REF</option>	
			<option value="WD">WD</option>
			<option value="MW">MW</option>		
		</select>
      </div>
      <div class="col-xs-4">
        <label>Model No.</label>
        <input name="model" class="form-control" type="text" required>
      </div>
	  <div class="col-xs-4">
        <label>Model Code</label>
        <input name="code" class="form-control" type="text" required>
      </div>
	  
	  <div class="col-xs-6">
        <label></label>        
      </div>
	  <label></label>
	  <div class="container" style="Margin:10px">
	  <input type="Submit" class="btn btn-primary" Name="Submit" Value="Genrate"/>
		</div>
	</div>
  </form>
</div>

<?php
			
			$category=Null;
			$model=Null;
			$code=Null;
		
			$user=$_SESSION['login_user'];
			
			
			if(isset($_POST['category'])){$category = $_POST['category'];}
			if(isset($_POST['model'])){$model= $_POST['model'];}
			if(isset($_POST['code'])){$code = $_POST['code'];}
			
		$sql = "INSERT INTO `model` (`ID`, `Category`, `Model`, `ModelCode`, `Date`, `user`) VALUES (NULL, '$category', '$model', '$code', NOW(), '$user');";
		if($category != Null){
		$insert=mysqli_query($conn,$sql);
		
		if($insert){
			echo "<script>window.alert('One New Record Added Successfully')</script>";
		
		}}
		
		
?>
<div class="responsive-table">
			<table class="table">
			<thead class="thead-inverse">
			<tr>
				<th>Sr. No</th>
				<th>Category</th>
				<th>Model Number</th>
				<th>Model Code</th>
				<th>Update</th>
				
			</tr>
			</thead>
			<?php
				$counter=0;
				$query="Select * from model Order by Category ASC";
				$run=mysqli_query($conn,$query);
				$rows=mysqli_num_rows($run);
				$page=ceil($rows/10);
				/*for($b=1;$b<=$page;$b++){
					?><a href="" style="text-decoration:none"><?php echo $b.""?></a><?php
				}*/
				
				while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcategory=$row[1];
					$showmodel=$row[2];
					$showcode=$row[3];
					$showdate=$row[4];
					$showuser=$row[5];
					$counter++;
			echo
			
			"
			<tbody>
			<tr>
				<th scope='row'>$counter</td>
				<td>$showcategory</td>		
				<td>$showcode</td>	
				<td>$showmodel</td>		
				<td><a href='editmodel.php?edit=$showid'>Edit</a>/<a href='deletemodel.php?del=$showid' onclick='return confirm(Sure To Delete!)'>Delete</a></td>

				
				
			</tr>
			<tbody>
			";
				}
			
			
			?>
			
			</table><br><br>
			
	
	
	</div>
	<div ID="footer">

</div>

</body>
</html>