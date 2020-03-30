<?php 
require_once('../../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');
include(SHARED_PATH.'/admin_header.php'); 
?>
<div class="wrapper" style="width:100%">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
	<div id="content">
		<div class="container-fluid">
		  	<div class="row">
			    <div class="col">
			      	<h1 class="h2"> 
						Florists Dashboard 
						<button type="button" id="addNewFloristButton" class="btn btn-primary" data-toggle="modal" data-target="#addNewFloristhsModal">                 
			            	<span> Add New </span>
			            </button>
			        </h1>
			    </div>
			    <?php // include('username/username.php'); ?>
			</div>
		</div>
        <div class="card">
			<div class="card-header">
			    <strong><small>  </small></strong>
			</div>		 
		  	<div class="card-body">	  
		  		<div class="row">
		  			<div class="col-sm-2">		 
						 <strong><label for="staticEmail2"><small style="font-weight:bold;">Store Name: </small></label> </strong>	
						<div class="row">
						  <div class="form-group mx-sm-3 mb-2">		
						     <input type="text" class="searchfloristDashboard form-control form-control-sm" placeholder="search here...">
						  </div>
						 </div>
					</div>
					<div class="col-sm-2">		 
						 <strong><label for="staticEmail2"><small style="font-weight:bold;">Country: </small></label> </strong>	
						<div class="row">
						  <div class="form-group mx-sm-3 mb-2">		
						     <select id="filterCountry" class="filterCountries form-control form-control-sm">
						     	<option value="select">--select--</option>
						     </select>
						    <div class="output_country_florist"></div>
						  </div>
						 </div>
					</div>
					<div class="col-sm-2">		 
						 <strong><label for="staticEmail2"><small style="font-weight:bold;"> State </small></label> </strong>	
						<div class="row">
						  <div class="form-group mx-sm-3 mb-2">		
						    	<select id="filterCountryState" class="filter_city_municipality form-control form-control-sm">
						    		<option value="select">--select--</option>
						    	</select>
						    	<!-- <div class="output_state_florist"></div> -->
						  </div>
						 </div>
					</div>
					<div class="col-sm-2">		 
						 <strong><label for="staticEmail2"><small style="font-weight:bold;"> Status: </small></label> </strong>	
						<div class="row">
						  <div class="form-group mx-sm-3 mb-2">		
						    	<?php echo $order_obj->status_acin(); ?> 		 
						  </div>
						 </div>
					</div>
					<div class="col-sm-1">		 
						 <strong><label for="staticEmail2"><small style="font-weight:bold;"> Clear Filters: </small></label> </strong>	
						<div class="row">
						  <div class="form-group mx-sm-3 mb-2">		
						    	 <button type="button" id="resetAllFilters" class="btn btn-sm btn-warning">reset</button>
						  </div>
						 </div>
					</div>
				</div>
		  	</div>
		</div>
		<table id="florist-table" class="table table-striped table-hover" style="font-size:14px;">
			<thead> 
			    <tr>
			    	<th scope="col">ID No.</th>
			    	<th scope="col">Name</th>
			    	<th scope="col">Contact Person</th>
			    	<th scope="col">Mobile No.</th>
			    	<th scope="col">Telephone No.</th>
			    	<th scope="col">Email</th>
			    	<th scope="col">Country</th>
			    	<th scope="col">State</th>
			    	<th scope="col">Status</th>
			    	<th scope="col">Action</th>
			    </tr>
		 	</thead>
		</table>
	</div>
	<?php include('../modal/florists-modal.php'); ?>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>
$( document ).ready(function() {
    $("#deleteFlorist").click(function(){
		var ID = $("input[name=delete_florist]").val();
 		trashfloristGenerateJSON(ID);
	});

    $(".close_option_florist").click(function(){
   		$(".florist_name").text("");
   });

    $("#view_on_google_maps").click(function(){
    	var latitude = $("input[name=latitude]").val();
    	var longitude = $("input[name=longitude]").val();
    	window.open('https://www.google.com/maps/?q='+latitude+','+longitude, '_blank');
    });

     $("#edit_view_on_google_maps").click(function(){
    	var edit_latitude = $("input[name=edit_latitude]").val();
    	var edit_longitude = $("input[name=edit_longitude]").val();
    	window.open('https://www.google.com/maps/?q='+edit_latitude+','+edit_longitude, '_blank');
    });

});

</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>