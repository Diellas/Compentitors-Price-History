 <?php
require('db/connect.php');
$id_prod = $_GET['par0'];
$barcode = $_GET['par1'];
$smallcode = $_GET['par2'];
$product_descr = $_GET['par3'];
$prod_category = $_GET['par4'];



	 $result = $wplink -> query("UPDATE product SET barcode=".$barcode." , code=".$smallcode.", description='".$product_descr."',cat_id=".$prod_category." where id=".$id_prod);
 


     if($result==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($db);
     }
 
 
?>