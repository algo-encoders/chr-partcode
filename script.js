
//Load Record by Search
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

//Close Warning Message


});

//<td><a href="editstore.php?editstore='.$showid.'">Edit</a></td>
//<th>Update</th>




