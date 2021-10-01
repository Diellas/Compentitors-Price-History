<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<?php include 'assets/head.php';?>
</head>
<body>

<div data-role="page">
		<?php include 'assets/header.php';?>
		
<div role="main" class="ui-content">
		<p id="msg"></p>
		
		<?php
		$prod_id = $_GET['par'];		
			$result = $wplink -> query("SELECT * FROM product where id=".$prod_id);
				while ($row = mysqli_fetch_array($result)) {
				$id_prod = row[0];
			?>

<div class="ui-grid-a">
	<div class="ui-block-a"><div class="ui-bar ui-bar-a">

		
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
			<div class="edit_prod_buttons">
				<button  onClick="edit_product(this.id)" class="ui-shadow ui-btn ui-corner-all blue_button">Καταχώρηση Αλλαγών</button>
				<button  onClick="delete_prod(this.id)" class="ui-shadow ui-btn ui-corner-all red_button">Διαγραφή κωδικού</button>
			</div>
		</form>
</div></div>
<div class="ui-block-b"><div class="ui-bar ui-bar-a">		
		
		<form id="userForm" method="POST">
					<input style="display:none;" type="text" name="prod_id" id="prod_id" value="<?php echo $prod_id; ?>" placeholder="Τιμή">
					<div  class="ui-grid-b">
					<div class="ui-block-a"><input type="text" name="price_val" id="price_val" value="" placeholder="Τιμή"></div>
					<div class="ui-block-b"><div class="ui-field-contain">
					<select name="comp" id="comp" data-mini="true">
					        <option value="1">DIELLAS</option>
					        <option value="2">LIDL</option>
					        <option value="3">KAZIANIS</option>
							<option value="4">SYNKA</option>
					    </select>
					</div>
						</div>
							<div class="ui-block-c"><div class="ui-field-contain"><button onClick="add_price(prod_id)" style="margin:.3em 0;padding:.5em 1em;" type="submit" id="submit-1" class="ui-shadow ui-btn ui-corner-all">Καταχώρηση</button>
							</div>
						</div>
				
					</div>
		</form>
		
</div></div>
</div>

		
</div>
		
</div>	 
</div>

</body>
</html>
