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



$query="SELECT part.ID,part.PartCode,part.PartNumber,part.Vendor,part.Category,model.Model,partname.PartName,part.Remarks,part.Date,part.Name
				FROM part
				INNER JOIN model
				ON part.Model=model.ModelCode
				INNER JOIN partname
				ON part.PartName=partname.NickName
				ORDER BY part.ID DESC;";
				$run=mysqli_query($conn,$query);
				
				$output ='<div class="responsive-table">
			<table class="table table-bordered">
			<thead class="thead-inverse">
			<tr>
				<th>Sr. No</th>
				<th>Part Number</th>
				<th>Vendor Code</th>
				<th>Category</th>
				<th>Model Number</th>
				<th>Part Name</th>
				<th>Remarks</th>
			</tr>
			</thead>';

	
while ($row=mysqli_fetch_array($run)){
					$showid=$row[0];
					$showcode=$row[1];
					$shownumber=$row[2];
					$showvendor=$row[3];
					$showcategory=$row[4];
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
				<td>'.$showvendor.'</td>
				<td>'.$showcategory.'</td>
				<td>'.$showmodel.'</td>	
				<td>'.$showpart.'</td>
				<td>'.$showremarks.'</td>	
				
				
				
				
			</tr>
			<tbody>';
			}
			
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=download.xls");
			echo $output;
?>