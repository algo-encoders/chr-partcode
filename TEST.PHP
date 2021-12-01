<?PHP 
		include("connection.php");
			$type="INBOUND";
			$status="INBOUND";
			$phone="03317565225";
			$job="7856874";
			$product="INBOUND";
			$model="INBOUND";
			$asc="INBOUND";
			$city="INBOUND";
			$remarks="INBOUND";
			$cro="sana";
		
		/*$sql = "UPDATE calls SET phone='03424405502' WHERE ID=2";
		$update=mysqli_query($conn,$sql);
		if($update){
			echo "Data Not Added";
		}*/
		
		$sql1 = "INSERT INTO calls (JobNo,CallType,Status,PhoneNo,Product,Model,AscName,City,Remarks,CRO) 
		Values ('8162598','INBOUND','Follow Up','03116333288','FPTV','LED40D3900i','Fine Video','Karachi','Mian Ny Complain Krwani Hay','Saiqa')";
		//$sql1 = "INSERT INTO calls (CRO) Values ('Metro Electronics')";
		$insert=mysqli_query($conn,$sql1);
		
		if($insert){
			echo "Data  Added";
		}
?>