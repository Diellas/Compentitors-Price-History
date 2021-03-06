<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<head>
    <title>Καταχώρηση Κωδικού</title>
    <meta name="copyright" content="Copyright 2021. All rights reserved.">
    <meta content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="/css/style.css" />
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script>
		function add_category(category_name)
		  {
			    var barcode = $('#barcode').val();
				var smallcode = $('#smallcode').val();
				var product_descr = $('#product_descr').val();
				var prod_category = $('#prod_category').val();
				 var x=confirm( "Είστε σίγουρος που θέλετε να προσθέσετε το προϊόν "+product_descr);
					if(x){
				
				$.ajax({
				url: "add_new_product.php?par1=" + barcode + "&par2= " + smallcode + "&par3= " + product_descr + "&par4= " + prod_category ,
				type: 'POST',
				success: function(result) {
					// use the result as you wish in your html here
				}});
				}
			}
	</script>
</head>
<body>

<div data-role="page">
		 <?php include 'assets/header.php';?>

		<div role="main" class="ui-content">
		<p id="msg"></p>
		<form id="userForm" method="POST">
			<label for="text-basic">Barcode:</label>
			<input type="text" name="barcode" id="barcode" value="">
			<label for="text-basic">Φορολογικός:</label>
			<input type="text" name="smallcode" id="smallcode" value="">
			<label for="text-basic">Περιγραφή:</label>
			<input type="text" name="product_descr" id="product_descr" value="">
			<label for="select-choice-a" class="select">Κατηγορία:</label>
			<select name="prod_category" id="prod_category" data-native-menu="false">
				<option>Διαλέξτε Κατηγορία</option>
			<?php
				
			$result = $wplink -> query("SELECT * FROM category");
				while ($row = mysqli_fetch_array($result)) {
					echo '<option value="'.$row[0].'">'.$row[1].'</option>';
					
				}
			?>
			</select>
			
			<button  onClick="add_category(this.id)" class="ui-shadow ui-btn ui-corner-all">Καταχώρηση</button>
		</form>	
		</div>
		
</div>	 
</div>

</body>
</html>

https://comp.diellas.eu/add_new_product.php?par1=321654&par2=321654321&par3=%27aasdasd%27&par4=1