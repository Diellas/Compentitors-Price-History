 <?php
require('db/connect.php');
$price_value = $_GET['par0'];
$comp = $_GET['par1'];
$prod_id = $_GET['par2'];
$date = date("Y-m-d");


  echo $price_value;
  
 
	 $result0 = $wplink -> query("select id from price where id_product=".$prod_id." and  id_comp=".$comp." and date=(select max(date) from price where id_product=".$prod_id." and  id_comp=".$comp.")");
	
	 $result = $wplink -> query("INSERT INTO price(value,date,latest_date,id_product,id_comp)VALUES(".$price_value.",'".$date."',1,".$prod_id.",".$comp.")");
 
	 $result2 = $wplink -> query("UPDATE price set latest_date=0 where id=".$result0.")");
 


     if($result==true)
     {
       echo "User data was inserted successfully";
     }
     else{
	echo  "Error: " . $wplink . "<br>" . mysqli_error($db);
     }
 
 $mysqli->close();
?>