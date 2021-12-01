<?php 
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];
	$local=Null;
	
	$CheckUser="Select * From user where User='$user' and UserType='user'";
	$QCheckUser=mysqli_query($conn,$CheckUser);
	$RCheckUser=mysqli_num_rows($QCheckUser);
	if($RCheckUser==1){$local="Display:None";}	
	
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
    <?php include('style.php') ?>
	<script src="js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!--<script src="script.js"></script>-->
	<script>
			$(document).ready(function(){
			$('#search').keyup(function(){
				
				var txt=$(this).val();

				if(txt!=''){
					$.ajax({
						url:"getdata/search.php",
						method:"Post",
						data:{search:txt},
						dataType:"text",
						success:function(data)
						{
							
							$('#result').html(data);
						}
		});
		}



	});	

//Load Model by Selecting Category

$('#cat').change(function(){
			
				var category=$(this).val()
				
				
					$.ajax({
						url:"getdata/model.php",
						method:"Post",
						data:{category:category},
						dataType:"text",
						success:function(ldmodel)
						{
							
							$('#Model').html(ldmodel);
						}
	});
		
	});
$('#cat').change(function(){
			
				var category=$(this).val()
				
				
					$.ajax({
						url:"getdata/part.php",
						method:"Post",
						data:{category:category},
						dataType:"text",
						success:function(ldpart)
						{
							
							$('#part').html(ldpart);
						}
	});
		
	});
$('#part').focusout(function(){
				
				
				var Model=$('#Model').val();
				var Part=$('#part').val();
				var vendor=$('#vendor').val();
				
				
					$.ajax({
						url:"getdata/duplicate.php",
						method:"Post",
						data:{Model:Model,Part:Part,vendor:vendor},
						dataType:"text",
						success:function(dup)
						{
							
							$('#duplicate').html(dup);
						}
	});
		
	});

$('#duplicat').click(function(){
    $('#duplicat').hide();
});
//Close Warning Message


});

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
		<li style="<?PHP echo $local;?>"><a href="addmodel.php">New Model</a></li>
		<li style="<?PHP echo $local;?>"><a href="addpart.php">New Part</a></li>
		<li><a href="getdata/export.php">Export</a></li>   
		<li style="<?PHP echo $local;?>"><a href="adduser.php">Add User</a></li> 
	    <li><a href="logout.php">Logout</a></li>
	</ul>
	<div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <!--<input type="text" class="form-control" id="search" placeholder="Search" name="q">
            <div class="input-group-btn">
                <span class="btn btn-default"><i class="glyphicon glyphicon-search"></i></span>
            </div>-->
        </div>
        </form>
    </div>
  </div>
</nav>
<div ID="duplicate">
	
</div>

<div style="<?PHP echo $local;?>"> 
 <h2>Enter Part Details:</h2>
  
  <form action="Store.php" method="Post">
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
        <label>Model No.</label>
		<select name="model" ID="Model" class="form-control"  required>				
		</select>
		
      </div>
      <div class="col-xs-3">
        <label>Part Name</label>
        <Select name="part" ID="part" class="form-control" required>
       
        </Select>
      </div>
      </div>
      <div class="col-xs-3">
        <label>Vendor Code</label>
        <Input Type="text" name="vendor" ID="vendor" class="form-control">
			
        </Select>
      </div>
	  <div class="col-xs-6">
        <label>Remarks</label>
        <textarea name="remarks" ID="remarks" class="form-control" rows="3"></textarea>
      </div>
	  <div class="col-xs-6">
        <label></label>        
      </div>
	  <label></label>
	  <div class="container" style="Margin:10px">
	  <input type="Submit" class="btn btn-primary" ID="submit" Value="Genrate"/>
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
			$partnumber=Null;
			$user=$_SESSION['login_user'];
			
			
			if(isset($_POST['category'])){$category = $_POST['category'];}
			if(isset($_POST['model'])){$model = $_POST['model'];}
			if(isset($_POST['part'])){$part= $_POST['part'];}
			if(isset($_POST['vendor'])){$vendor= $_POST['vendor'];}
			if(isset($_POST['remarks'])){$remarks = $_POST['remarks'];}
		//Check Duplicate Data From DB	
		$check="Select * From part Where Category='$category' and Model='$model' and PartName='$part'";
		$checkrun=mysqli_query($conn,$check);
		$checkrow=mysqli_num_rows($checkrun);
		//if($checkrow>0){
		//	echo "<script>confirm('Duplicate Data! Click OK to Add & Cancel to Edit')</script>";
		//}

		//Make Part Number	
		$maxPartQry="Select max(PartCode) FROM part";
		$maxPartRun=mysqli_query($conn,$maxPartQry);
		$maxpart=mysqli_fetch_array($maxPartRun);
		$partcode=$maxpart[0]+1;
		$invID = str_pad($partcode,6,'0', STR_PAD_LEFT);
		$partnumber=$model."-".$part."-".$invID;
		$product;

		
		//Insert Query For inserting data in DB
		$sql = "INSERT INTO `part` (`ID`, `PartCode`, `PartNumber`, `Vendor`, `Category`, `Model`, `PartName`, `Remarks`, `Date`, `Name`) 
		VALUES (NULL, '$partcode', '$partnumber', '$vendor', '$category', '$model', '$part','$remarks', NOW(), '$user');";
		if(($category != Null) ){
		$insert=mysqli_query($conn,$sql);
		
		if($insert){
			echo "<script>window.alert('New Part No. ".$partnumber." is Genrated Successfully!!')</script>";
		
		}
		}
		
	?>


<div id="result">
	<div class="responsive-table" ID="hide">
			<table class="table" id="myTable">
			<thead class="thead-inverse">
			<tr>
				<th>Sr. No</th>
				<th>Part Number</th>
				<th>Vendor Code</th>
				<th>Category</th>
				<th>Model Number</th>
				<th>Part Name</th>
				<th>Remarks</th>
				<th>Update</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				$counter=0;
				$query="SELECT part.ID,part.PartCode,part.PartNumber,part.Vendor,part.Category,model.Model,partname.PartName,part.Remarks,part.Date,part.Name
				FROM part
				INNER JOIN model
				ON part.Model=model.ModelCode
				INNER JOIN partname
				ON part.PartName=partname.NickName
				ORDER BY part.ID DESC;";
				$run=mysqli_query($conn,$query);
				
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
					$counter++;
			echo
			
			'
			<tr>
				<td>'.$counter.'</td>
				<td>'.$shownumber.'</td>
				<td>'.$showvendor.'</td>
				<td>'.$showcategory.'</td>
				<td>'.$showmodel.'</td>	
				<td>'.$showpart.'</td>
				<td>'.$showremarks.'</td>
				<td>'."<a href=editstore.php?id=$showid>Edit</a>".'</td>	
				
				
				
			</tr>
			';
				}
			
			?>
			
			</tbody></table><br><br>
	
	
	</div>

				
</div>
	<div ID="footer">

</div>

<?php include('script.php') ?>
<script>$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

</body>
</html>