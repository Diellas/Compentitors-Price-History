<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<head>
    <title>Καταχώρηση Κατηγορίας</title>
    <meta name="copyright" content="Copyright 2021. All rights reserved.">
    <meta content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="/css/style.css" />
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script>
	

		function add_category(category_name)
		  {
			  var category_name = $('#category_name').val();
			   var x=confirm( "Είστε σίγουρος που θέλετε να προσθέσετε την κατηγορία "+category_name);
           if(x){
			    
				$.ajax({
				url: "add_new_category.php?par1=" + category_name,
				type: 'POST',
				success: function(result) {
					// use the result as you wish in your html here
				}});

			}
		  }


	</script>
</head>
<body>

<div data-role="page">
		<div data-role="header">
			<h1>Καταχώρηση Κατηγορίας</h1>
		</div><!-- /header -->
		<div role="main" class="ui-content">
		<p id="msg"></p>
		<form id="userForm" method="POST">
			<label for="text-basic">Όνομα Κατηγορίας:</label>
			<input type="text" name="category_name" id="category_name" value="">
			<button  onClick="add_category(this.id)" class="ui-shadow ui-btn ui-corner-all">Καταχώρηση</button>
		</form>	
		</div>
		
</div>	 
</div>

</body>
</html>
