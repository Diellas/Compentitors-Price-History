<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<?php include 'assets/head.php';?>
<body>

<div data-role="page">
		 <?php include 'assets/header.php';?>

		<div role="main" class="ui-content">
		<p id="msg"></p>
		<form id="userForm" method="POST">
			<label for="text-basic">Όνομα Κατηγορίας:</label>
			<input type="text" name="category_name" id="category_name" value="">
			<button  onClick="add_category(category_name)" class="ui-shadow ui-btn ui-corner-all blue_button">Καταχώρηση</button>
		</form>	
		</div>
		
</div>	 
</div>

</body>
</html>
