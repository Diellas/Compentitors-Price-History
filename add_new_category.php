 <?php
require('db/connect.php');
$category_name = $_GET['par1'];

	 $result = $wplink -> query("INSERT INTO category(description)VALUES('".$category_name."')");

     if($result==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($db);
     }
 
 
?>