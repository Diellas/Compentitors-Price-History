 <?php
require('db/connect.php');
$barcode = $_GET['par1'];
$smallcode = $_GET['par2'];
$product_descr = $_GET['par3'];
$prod_category = $_GET['par4'];


	 $result = $wplink -> query("INSERT INTO product(barcode,code,description,cat_id)VALUES(".$barcode.",".$smallcode.",'".$product_descr."',".$prod_category.")");

     if($result==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($db);
     }
 
 
?>