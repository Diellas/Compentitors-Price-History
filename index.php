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
							echo '<ul class="main-list" data-role="listview">';
								$result = $wplink -> query("select * from category");
								while ($row = mysqli_fetch_array($result)) {
									if( $row[3]==1){
										echo '<li style="padding:0;" data-role="collapsible" data-iconpos="right" data-inset="false">';
										echo "<h2 style='margin: 0;'>".$row[1]."</h2>";
										echo '<ul data-role="listview" >';
										$result2 = $wplink -> query("select * from category where parent_id = ".$row[0]);
										while ($row = mysqli_fetch_array($result2)) {
											echo'<li id="'.$row[0].'" onClick="run_category(this.id)"><a href="#">'.$row[1].'</a></li>';
										}
										echo '</ul>';
									 echo '</li>';

									}elseif ($row[3]== 0 & $row[2] == 0) {
						
										echo'<li id="'.$row[0].'" onClick="run_category(this.id)"><a href="#">'.$row[1].'</a></li>';
									}								
								}
							echo '</ul>';?>
					</div></div>
					
				<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="min-height:120px">
							<form>
							<ul class="product_list has-listCheck" data-role="listview" data-split-icon="gear" data-split-theme="a"></ul>
							<input type='button' value='Δες τιμές' id='but'>
							</form>
					</div></div>
	
			</div>
		</div>
		
</div>	 
</div>

  <script>
  $(document).ready(function(){
   $('#but').click(function(){
    var key = 0;
	var url="https://comp.diellas.eu/anazitisi.php?par0=";
    var flag=false;
	$("input:checkbox[name=choice]:checked").each(function(){
         if(!flag)
         {
           url=url+$(this).val();
           flag=true;// To trace if first query string added
         }else{
             url=url+"&par"+key+"="+$(this).val();
         }  
		key = key + 1;		 
      });
	  
		window.location.href = url;
   });
 });
 </script>
 
 
</body>
</html>
