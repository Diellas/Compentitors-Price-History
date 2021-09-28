<?php require('db/connect.php'); ?>
<?php
$categ_id = $_POST['id'];

$result = $wplink -> query("select * from product where cat_id=".$categ_id);

while ($row = mysqli_fetch_array($result)) {
				$output ='<li>
				<a  href="anazitisi.php?product_id='.$row[0].'">'. $row[1].' '.$row[2].' '.$row[3].'</a>
				<a href="edit_product.php?product_id='.$row[0].'">Edit Product</a>
				
				</li>';
				
			echo $output;
			}


?>