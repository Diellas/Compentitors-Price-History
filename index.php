<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<head>
    <title>Ανταγωνισμός</title>
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
		<script type="text/javascript">
		  function run_category(clicked_id)
		  {
			
			   $.ajax({
				url: 'get_product_list.php',
				type: 'POST',
				data: { id: clicked_id }
				})
					 .done(function( response ) {
					  $("ul.product_list").html(response);
				});
			}

		</script>
</head>
<body>

<div data-role="page">
		<div data-role="header">
			<h1>Αναζήτη Κωδικού</h1>
		</div><!-- /header -->
		<div role="main" class="ui-content">

		
			<div class="ui-grid-a"><div class="ui-block-a">
					<div class="ui-bar ui-bar-a" style="min-height:120px">
							<?php
							echo '<ul data-role="listview" data-inset="true">';
								$result = $wplink -> query("select * from category");
								while ($row = mysqli_fetch_array($result)) {
									echo'<li id="'.$row[0].'" onClick="run_category(this.id)"><a href="#">'.$row[1].'</a></li>';
								}
							echo '</ul>';?>
					</div></div>
				<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="min-height:120px">
							<ul class="product_list" data-role="listview" data-split-icon="gear" ></ul>
					</div></div>
			</div>
		</div>
		
</div>	 
</div>

</body>
</html>
