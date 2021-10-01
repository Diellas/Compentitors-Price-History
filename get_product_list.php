<?php require('db/connect.php'); ?>
<?php
$categ_id = $_POST['id'];

$result = $wplink -> query("select * from product where cat_id=".$categ_id);
 
if(mysqli_num_rows($result) > 0){

	while ($row = mysqli_fetch_array($result)) {
					$output ='<li>
					<a rel="external" data-ajax="false" href="anazitisi.php?par='.$row[0].'"><h3>'. $row[1].' '.$row[2].' '.$row[3].'</h3></a>
					<a  rel="external" data-ajax="false" href="edit_product.php?par='.$row[0].'"></a>
					<div class="listCheck"><div class="ui-checkbox"><label><input type="checkbox" value="'.$row[0].'" name="choice" ></label></div></div>
					</li>';
				echo $output;
				}


 }else{
	 echo "<li>Δεν υπάρχουν κωδικοί στην κατηγορία</li>";
	
	}

?>