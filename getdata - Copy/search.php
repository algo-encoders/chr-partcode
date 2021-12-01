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


$search=$_POST['search'];
$query="SELECT part.ID,part.PartCode,part.PartNumber,part.Category,model.Model,partname.PartName,part.Remarks,part.Date,part.Name
				FROM part
				INNER JOIN model
				ON part.Model=model.ModelCode
				INNER JOIN partname
				ON part.PartName=partname.NickName
				Where part.PartNumber like '%$search%' or part.Category like '%$search%' or model.Model like '%$search%' or partname.PartName like '%$search%'
				or part.Remarks like '%$search%'
				ORDER BY part.ID DESC;";
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
				<th>Remarks</th>
				<th>Update</th>
			</tr>
			</thead>';

	
while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcode=$row[1];
					$shownumber=$row[2];
					$showcategory=$row[3];
					$showmodel=$row[4];
					$showpart=$row[5];
					$showremarks=$row[6];
					$showdate=$row[7];
					$showuser=$row[8];
					$counter++;
$output .= '<tbody>
			<tr>
				<td>'.$counter.'</td>
				<td>'.$shownumber.'</td>
				<td>'.$showcategory.'</td>
				<td>'.$showmodel.'</td>	
				<td>'.$showpart.'</td>
				<td>'.$showremarks.'</td>	
				<td><a href="editstore.php?editstore='.$showid.'">Edit</a></td>
				
				
				
			</tr>
			<tbody>';
			}
			echo $output;


?>