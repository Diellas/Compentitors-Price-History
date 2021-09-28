 <?php
require('db/connect.php');
$id_prod = $_GET['par0'];




	 $result = $wplink -> query("delete from product where id=".$id_prod);
 


     if($result==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($db);
     }
 
 
?>