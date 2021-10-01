 <?php
require('db/connect.php');
$price_value = $_GET['par0'];
$comp = $_GET['par1'];
$prod_id = $_GET['par2'];
$date = date("Y-m-d H:i:s");


	$sql2="UPDATE price SET latest_date=0 where id=(select id from price where 
	id_product=".$prod_id." and id_comp=".$comp." and date=(select max(date) from
	price where id_product=".$prod_id." and  id_comp=".$comp."))";

	$result2 = $wplink -> query($sql2);
	$result = $wplink -> query("INSERT INTO price(value,date,latest_date,id_product,id_comp)VALUES(".$price_value.",'".$date."',1,".$prod_id.",".$comp.")");

 

?>