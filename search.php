<?php
		
include("connection.php");
session_start();

if(!isset($_SESSION['login_user']))
	{
	header("Location: Index.php");
	}
	$user=$_SESSION['login_user'];

$output="";
$counter=0;

//$search=$_POST['search'];
$search = "FPTV";
$query="SELECT part.ID,part.PartCode,part.PartNumber,part.Category,model.Model,part.PartName,part.Remarks,part.Date,part.Name
				FROM part
				INNER JOIN model
				ON part.Model=model.ModelCode
				Where part.PartNumber like '%$search%' or part.Category like '%$search%' or model.Model like '%$search%' or Part.PartName like '%$search%'
				ORDER BY part.ID DESC;"
	echo $query;
				$run=mysqli_query($conn,$query);


				$output ='<div class="responsive-table">
			<table class="table">
			<thead class="thead-inverse">
			<tr>
				<th>Sr. No</th>
				<th>Part Number</th>
				<th>Category</th>
				<th>Model Number</th>
				<th>Part Name</th>
				<th>Short Name</th>
				<th>Remarks</th>
				<th>Update</th>
			</tr>
			</thead>';

	
while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcode=$row[1];
					$shownumber=$row[2];
					$showcategory=$row[3];
					$showproduct=$row[4];
					$showmodel=$row[5];
					$showpart=$row[6];
					$showremarks=$row[7];
					$showdate=$row[8];
					$showuser=$row[9];
					$counter++;
$output .= '<tbody>
			<tr>
				<td>'.$counter.'</td>
				<td>'.$shownumber.'</td>
				<td>'.$showcategory.'</td>
				<td>'.$showproduct.'</td>	
				<td>'.$showmodel.'</td>
				<td>'.$showpart.'</td>	
				<td>'.$showremarks.'</td>	
				<td><a href="editstore.php?editstore='.$showid.'">Edit</a></td>
				
				
				
			</tr>
			<tbody>';
			}
			echo $output;


?>