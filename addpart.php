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
  
  <form action="addpart.php" Method="Post">
    <div class="form-group">
    <div class="col-xs-3">
        <label>Category</label>
        
		<select name="category" ID="cat" class="form-control" required>
			
			<option value="">Select Category</option>
			<option value="AC">AC</option>
			<option value="AS">AS</option>
			<option value="FPTV">FPTV</option>
			<option value="REF">REF</option>	
			<option value="WD">WD</option>
			<option value="MW">MW</option>
			<option value="OTH">OTHERS</option>			
		</select>
		
		
      </div>
     
      <div class="col-xs-3">
        <label>Part Name</label>
        <input name="part" class="form-control" type="text" required>
      </div>
	  <div class="col-xs-3">
        <label>Part Nick Name</label>
        <input name="nick" class="form-control" type="text" required>
      </div>
	  
	  <div class="col-xs-1">
        <label></label>        
      </div>
	  <label></label>
	  <div class="container" style="Margin:5px">
	  <input type="Submit" class="btn btn-primary" Name="Submit" Value="Add Part"/>
		</div>
	</div>
  </form>
</div>

<?php
			
			
			$part=Null;
			$nick=Null;
			$cat=Null;
		
			$user=$_SESSION['login_user'];
			
			
			
			if(isset($_POST['category'])){$cat= $_POST['category'];}
			if(isset($_POST['part'])){$part= $_POST['part'];}
			if(isset($_POST['nick'])){$nick = $_POST['nick'];}

			
		$sql = "INSERT INTO `partname` (`ID`, `NickName`, `PartName`, `Cat`, `Date`, `user`) VALUES (NULL, '$nick', '$part', '$cat', NOW(), '$user');";
		if($part != Null){
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
				<th>Part Name</th>
				<th>Part Nick Name</th>
				<th>Category</th>
				<th>Update</th>
				
			</tr>
			</thead>
			<?php
				$counter=0;
				$query="Select * from partname Order by ID DESC";
				$run=mysqli_query($conn,$query);
				$rows=mysqli_num_rows($run);
				$page=ceil($rows/10);
				/*for($b=1;$b<=$page;$b++){
					?><a href="" style="text-decoration:none"><?php echo $b.""?></a><?php
				}*/
				
				while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$shownick=$row[1];
					$showpart=$row[2];					
					$showcat=$row[3];
					$showuser=$row[4];
					$counter++;
			echo
			
			"
			<tbody>
			<tr>
				<th scope='row'>$counter</td>		
				<td>$showpart</td>	
				<td>$shownick</td>
				<td>$showcat</td>		
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