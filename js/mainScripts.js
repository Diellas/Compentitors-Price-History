function run_category(clicked_id)
		  {
			
			   $.ajax({
				url: '../get_product_list.php',
				type: 'POST',
				data: { id: clicked_id }
				})
					 .done(function( response ) {
					  $('ul.product_list').empty();
					  $('ul.product_list').append(response).listview('refresh');
				});
			}
			
function edit_product(id_prod)
		  {
				var id_prod = $('#id_prod').val();
			    var barcode = $('#barcode').val();
				var smallcode = $('#smallcode').val();
				var product_descr = $('#product_descr').val();
				var prod_category = $('#prod_category').val();
				 var x=confirm( "Είστε σίγουρος που θέλετε να τροποποιήσετε το προϊόν "+product_descr);
					if(x){
				
				$.ajax({
				url: "../edit_this_product.php?par0=" + id_prod + "&par1=" + barcode + "&par2= " + smallcode + "&par3= " + product_descr + "&par4= " + prod_category ,
				type: 'POST',
				success: function(result) {
					// use the result as you wish in your html here
				}});
				}
			}
					
function delete_prod(id)
		  {
				var id_prod = $('#id_prod').val();
				var y=confirm( "Είστε σίγουρος που θέλετε να διαγράψετε το προϊόν");
					if(y){
				
					$.ajax({
					url: "../delete_product.php?par0=" + id_prod,
					type: 'POST',
					success: function(result) {
						// use the result as you wish in your html here
					}});
					}
			}
			
function add_category(category_name)
		  {
			  var category_name = $('#category_name').val();
			   var x=confirm( "Είστε σίγουρος που θέλετε να προσθέσετε την κατηγορία "+category_name);
           if(x){
			    
				$.ajax({
				url: "../add_new_category.php?par1=" + category_name,
				type: 'POST',
				success: function(result) {
					// use the result as you wish in your html here
				}});

			}
		  }

function add_price(prod_id)
		  {
			  var price_val = $('#price_val').val();
			  var comp = $('#comp').val();
			  var prod_id = $('#prod_id').val();
			   var z=confirm( "Είστε σίγουρος που θέλετε να προσθέσετε την τιμή ");
				if(z){
			    
				$.ajax({
				url: "../add_price.php?par0=" + price_val + "&par1=" + comp + "&par2= " + prod_id ,
				type: 'POST',
				success: function(result) {
					// use the result as you wish in your html here
				}});

			}
		  }		  
		  
