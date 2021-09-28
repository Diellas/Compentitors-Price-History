<!DOCTYPE html>
<?php require('db/connect.php'); ?>
<html lang="en">
<?php include 'assets/head.php';?>
<body>
<div data-role="page">
     <?php include 'assets/home_header.php';?>
	 
		<div role="main" class="ui-content">

		
			<div class="ui-grid-a"><div class="ui-block-a">
					<div class="ui-bar ui-bar-a" style="min-height:120px;    background: 0; border: 0;">
							<?php
							echo '<ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">';
								$result = $wplink -> query("select * from category");
								while ($row = mysqli_fetch_array($result)) {
									echo'<li id="'.$row[0].'" onClick="run_category(this.id)"><a href="#">'.$row[1].'</a></li>';
								}
							echo '</ul>';?>
					</div></div>
				<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="min-height:120px">
							<ul class="product_list" data-role="listview" data-split-icon="gear" >
							</ul>
					</div></div>
			</div>
		</div>
		
</div>	 
</div>

</body>
</html>
