    <?php  

 $number = count($_POST["name"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
				echo $_POST["name"][0];
                $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
                echo $sql;
           }  
      }  
     
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 