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
				
				
				foreach($_GET as $par => $value){
				
					$prod_id = $value;
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
								$timestamp = strtotime($row_date[1]);
								echo '<option value="1"><span class="price_tag" >'.$row_date[0].'€</span>  --  '.date('d/m/Y', $timestamp).'</option>';
							
							}

						echo ' </select></div></form></td>';
					}
					echo '<td><a href="edit_product.php?par='.$prod_id.'" title="Edit Product" class="ui-btn ui-btn-icon-notext ui-icon-gear"></a></td>';
					echo '</tr>';
				
				}/*CLOSE EACH*/
				
				
				mysqli_close($wplink);
				?>
				</tbody>
				</table>
				
				

</div>

		</div>


</div>	 


</body>

<?php $mysqli->close();?>
</html>
