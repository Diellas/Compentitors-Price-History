<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<head>
    <title>Ανταγωνισμός</title>
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

</head>
<body>

<div data-role="page">
		<div data-role="header">
			<h1>Αναζήτηση Κωδικού</h1>
		</div><!-- /header -->


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
				echo '</tr>';
				mysqli_close($wplink);
				?>
				</tbody>
				</table>
		</div>


</div>	 


</body>
</html>
