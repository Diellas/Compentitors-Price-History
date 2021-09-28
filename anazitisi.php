<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">

<body>
		<?php include 'assets/head.php';?>
<div data-role="page">
		 <?php include 'assets/header.php';?>



<div role="main" class="ui-content">
		
				<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
				<tbody>
				<thead id="headerN">
					<th>BARCODE</th>
					<th>ΦΟΡΟΛΟΓΙΚΟΣ</th>
					<th>ΠΕΡΙΓΡΑΦΗ</th>
				</thead>
				<?php
				$prod_id = $_GET['product_id'];
				$result = $wplink -> query("SELECT * FROM product where id=".$prod_id."");
				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>';
					echo '<td>'.$row[1].'</td><td>  '.$row[2].'</td><td> '.$row[3].'</td>';
					
				}

				$result = $wplink -> query("select competitor.id, competitor.description, price.date, price.value from price, competitor where price.id_comp=competitor.id and price.latest_date = 1  and id_product = ".$prod_id." order by competitor.id;
				");
				while ($row = mysqli_fetch_array($result)) {
										
					echo "<script type=\"text/javascript\">					
					$('thead tr').append( $('<th />', {text : '".$row[1]."'}) )						
					</script>";
					
						$result_price_date = $wplink -> query("select value, date from price where id_comp = ".$row[0]." order by date DESC");
						
						echo '<td style="padding: 0;"><form><div class="ui-field-contain"><select name="select-native-2" id="select-native-2" data-mini="true">';
												
						while ($row_date = mysqli_fetch_array($result_price_date)) {
						
							echo '<option value="1">'.$row_date[0].'  --  '.$row_date[1].'</option>';
						
						}

					echo ' </select></div></form></td>';
				}
				echo '<td><a href="edit_product.php?product_id=2" title="Edit Product" class="ui-btn ui-btn-icon-notext ui-icon-gear"></a></td>';
				echo '</tr>';
				mysqli_close($wplink);
				?>
				</tbody>
				</table>
				
				
				<form id="userForm" method="POST">
					<input style="display:none;" type="text" name="prod_id" id="prod_id" value="<?php echo $prod_id; ?>" placeholder="Τιμή">
					<div  class="ui-grid-b" style="margin-top:80px;    width: 30%;">
					<div class="ui-block-a"><input type="text" name="price_val" id="price_val" value="" placeholder="Τιμή"></div>
					<div class="ui-block-b"><div class="ui-field-contain">
					<select name="comp" id="comp" data-mini="true">
					        <option value="1">DIELLAS</option>
					        <option value="2">LIDL</option>
					        <option value="3">KAZIANIS</option>
					    </select>
					</div>
						</div>
							<div class="ui-block-c"><div class="ui-field-contain"><button onClick="add_price(prod_id)" style="margin:.3em 0;padding:.5em 1em;" type="submit" id="submit-1" class="ui-shadow ui-btn ui-corner-all">Καταχώρηση</button>
							</div>
						</div>
				
					</div>
				</form>
</div>
<?php 

$result0 = $wplink -> query("select id from price where id_product=1 and  id_comp=1 and date=(select max(date) from price where id_product=1 and  id_comp=1)");
	while ($row = mysqli_fetch_array($result0)){
		echo $row[0];
	}

?>
		</div>


</div>	 


</body>

<?php $mysqli->close();?>
</html>
