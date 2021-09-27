<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<head>
    <title>Καταχώρηση Κατηγορίας</title>
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
				var id_prod = $('#id_prod').val();
			    var barcode = $('#barcode').val();
				var smallcode = $('#smallcode').val();
				var product_descr = $('#product_descr').val();
				var prod_category = $('#prod_category').val();
				 var x=confirm( "Είστε σίγουρος που θέλετε να τροποποιήσετε το προϊόν "+product_descr);
					if(x){
				
				$.ajax({
				url: "edit_this_product.php?par0=" + id_prod + "&par1=" + barcode + "&par2= " + smallcode + "&par3= " + product_descr + "&par4= " + prod_category ,
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
		<div data-role="header">
			<h1>Επεξεργασία Κωδικού</h1>
		</div><!-- /header -->
		<div role="main" class="ui-content">
		<p id="msg"></p>
		
		<?php
				
			$result = $wplink -> query("SELECT * FROM product where id=3");
				while ($row = mysqli_fetch_array($result)) {
				$id_prod = row[0];
			?>
		
		<form id="userForm" method="POST">
			<input style="display:none;" type="text" name="id_prod" id="id_prod" value="<?php echo $row[0];?>">
			<label for="text-basic">Barcode:</label>
			<input type="text" name="barcode" id="barcode" value="<?php echo $row[1];?>">
			<label for="text-basic">Φορολογικός:</label>
			<input type="text" name="smallcode" id="smallcode" value="<?php echo $row[2];?>">
			<label for="text-basic">Περιγραφή:</label>
			<input type="text" name="product_descr" id="product_descr" value="<?php echo $row[3];?>">
			<label for="select-choice-a" class="select">Κατηγορία:</label>
			<select name="prod_category" id="prod_category" data-native-menu="false">
			
				<?php
				$result = $wplink -> query("SELECT * FROM category");
				while ($row2 = mysqli_fetch_array($result)) {
					
					if($row[4]==$row2[0]){
						echo '<option selected="selected" value="'.$row2[0].' ">'.$row2[1].'</option>';
					}else{
						echo '<option value="'.$row2[0].' ">'.$row2[1].'</option>';	
					}

				}
				?>
			</select>
			<?php } ?>
			<button  onClick="add_category(this.id)" class="ui-shadow ui-btn ui-corner-all">Καταχώρηση Αλλαγών</button>
		</form>	
		</div>
		
</div>	 
</div>

</body>
</html>
