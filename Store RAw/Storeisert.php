<?php
			
			$category=Null;
			$model=Null;
			$part=Null;
			$remarks=Null;
			$partcode=Null;
			$partnumber=Null;
			$user=$_SESSION['login_user'];
			
			
			if(isset($_POST['category'])){$category = $_POST['category'];}
			if(isset($_POST['model'])){$model = $_POST['model'];}
			if(isset($_POST['part'])){$part= $_POST['part'];}
			if(isset($_POST['remarks'])){$remarks = $_POST['remarks'];}
			
		$check="Select * From part Where Category='$category' and Model='$model' and PartName='$part'";
		$checkrun=mysqli_query($conn,$check);
		$checkrow=mysqli_num_rows($checkrun);
		if($checkrow>0){
			echo "<script>confirm('Duplicate Data! Click OK to Add & Cancel to Edit')</script>";
		}

			
		$maxPartQry="Select max(PartCode) FROM part";
		$maxPartRun=mysqli_query($conn,$maxPartQry);
		$maxpart=mysqli_fetch_array($maxPartRun);
		$partcode=$maxpart[0]+1;
		$invID = str_pad($partcode,6,'0', STR_PAD_LEFT);
		$partnumber=$model."-".$part."-".$invID;
		$product;

		
		
		$sql = "INSERT INTO `part` (`ID`, `PartCode`, `PartNumber`, `Category`, `Model`, `PartName`, `Remarks`, `Date`, `Name`) 
		VALUES (NULL, '$partcode', '$partnumber', '$category', '$model', '$part','$remarks', NOW(), '$user');";
		if(($category != Null) ){
		$insert=mysqli_query($conn,$sql);
		
		if($insert){
			echo "<h1><font color=#800080>Data Added</font></h1>";
		
		}
		}
		
	?>


	<script>
		$(document).ready(function(){

			$('#submit').click(function(){
				var category=$('#cat').val();
				var model=$('#Model').val();
				var part=$('#part').val();
				var remarks=$('#remarks').val();				
				
					$.ajax({
						url:"getdata/insertpart.php",
						method:"Post",
						data:{category:category,model:model,part:part,remarks:remarks},
						dataType:"text",
						success:function(insert)
						{
							
							$('#Mode').html(insert);
						}
	});
		
	});				

	});
	</script>