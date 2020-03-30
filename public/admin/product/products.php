<?php 
include('../template/header.php');
$page_title = 'Product Dashboard';
include('../template/header.php');
?>
<div class="wrapper" style="width:100%">
	<?php include('../template/sidebar-navigation.php'); ?>
	<div id="content">
		<div class="container-fluid">
		  	<div class="row">
			    <div class="col">
			      	<h1 class="h2"> Products Dashboard </h1>
			    </div>
			    <?php include('username/username.php'); ?>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<table id="products" class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col" width="10%">Product Code</th>
			      <th scope="col" width="10%">Product Name</th>
			      <th scope="col">Product Photo</th>
			      <th scope="col">Build List</th>
			      <th scope="col">Supplier Price</th>
			      <th scope="col">Mabuhay Price</th>
			      <th scope="col">Margin</th>
			      <th scope="col">Margin %</th>
			    </tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>
		</div>
	</div>
	<?php include('modal/florists-modal.php'); ?>
</div>
<?php include('../template/javascript.php'); ?>
<script>
$(document).ready(function(){

	var table = $('#products').DataTable({ 
		"scrollCollapse"	: false,
        "paging"			: false,
        "orderClasses"		: false,
        "ordering"			: false,
        "select" 			: true,
         ajax				: "../service/product.php",
         "columns": [
            { "data": "product_id"				},
            { "data": "product_name"			},
            { 
            	"data": "product_photo",
	            "render": function(data, type, row, meta){
	            	console.log(data);
		            if(type === 'display'){
		                data = '<img class="img-fluid" width="150" src="'+data+'">';
		                // data = '<a class="mod_order_number" href="https://mod.dev.websavii.com/view/order-assign.php?id='+data.id+'">'+data.order_number+'</a>';
		            }
		            return data;
		         }		
            },
            { "data": "product_build_list"		},
            { "data": "product_price"			},
            { "data": "product_margin"			},
            { "data": "product_margin_percent"	},
            { "data": "product_order_count"		}
   		],
   		"deferLoading": 	57,
	});

});
</script>
<?php include('../template/footer.php'); ?>