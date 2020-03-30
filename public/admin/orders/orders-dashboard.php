<?php
require_once('../../../private/initialize.php');
include(SHARED_PATH.'/admin_header.php');
$page_title = 'Order Dashboard';
?>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                <div class="container-fluid">
					<h4 class="text-left"> <?php echo $page_title; ?> </h4>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <i class="fas fa-user-circle" style="font-size: 30px;"></i>
				  				<span class="username text-info" style="font-size:14px;"></span>
                            </li>                        
                        </ul>
                    </div>					  			
                </div>
            </nav> 
	      	<div class="card mb-3">
	      		
					<div class="card-header">
					    <strong><small>  </small></strong>
					</div>		 
				  	<div class="card-body">	  
				  		<div class="row">
					  		<div class="col-md-1 mb-3">
								<form>
									<div class="form-group mb-1">
							    	 	<strong><label for="staticEmail2"><small style="font-weight:bold;"> Show Entries : </small></label> </strong>
									</div>
										<select name="page_length" class="custom-select form-control-sm">
										<?php			

											if( $orders['total_page'] != 0){
												for($perpage = 1; $perpage < $orders['total_page']; $perpage++){
													if($perpage % $order_obj::LIMIT_LIST == 0){							
														echo "<option value=".$perpage.">".$perpage."</option>";	
													}elseif( $order_obj::DEFAULT_PAGE > $orders['total_page'] ){
														$perpage = 20;
														echo "<option value=".$perpage." >".$perpage."</option>";	
													}elseif($order_obj::DEFAULT_PAGE == $orders['total_page']){
														$perpage = 20;
														echo "<option value=".$perpage." >".$perpage."</option>";	
													}
												}
											}else {
												$perpage = 20;
												echo "<option value=".$perpage." >".$perpage."</option>";	
											}
										?>
									</select>
									<input type="hidden" name="order_total_page" value="<?php echo $orders['total_page']; ?>" />
								</form>
							</div>	
							<div class="col-md-2">
								<form id="orderDateForm" action="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>" method="post">
									<div class="form-group mb-1">
									     <strong><label for="staticEmail2"><small style="font-weight:bold;">Order Date: </small></label> </strong>
									</div>
									<div class="form-group mx-sm-3 mb-2">
										<div class="form-group mb-1">
										    <strong><label for="staticEmail2"><small style="font-weight:bold;">From:</small></label></strong>
										</div>
										<div class="form-row">
											<div class="form-group col-md-7 mb-1">
											   	<input type="text" id="fromOrderDate" class="form-control form-control-sm"  name="or_start_date" value="<?php echo $or_start_date; ?>" size="10" placeholder="mm/dd/yyyy">
											</div>
										</div>
										<div class="form-group mb-1">
										   <strong><label for="staticEmail2"><small style="font-weight:bold;">To</small></label></strong>
										</div>
										<div class="form-row">
										    <div class="form-group col-md-7 mb-1">
										      <input type="text" id="toOrderDate" name="or_end_date" class="form-control form-control-sm" value="<?php echo $or_end_date; ?>" size="10" placeholder="mm/dd/yyyy">
										    </div>
										    <div class="form-group col-md-4 mb-1">
										    	 <button id="orderDateButton" type="submit" name="order_date" value="submit" class="btn btn-primary btn-sm">Filter</button>
										    </div>
										</div>							
									</div>		
								</form>						
							</div>
						   <div class="col-md-2">  
						   		<form id="deliveryDateForm" action="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>" method="post">
								    <div class="form-group mb-1">
								        <strong><label for="staticEmail2"><small style="font-weight:bold;">Delivery Date: </small></label> </strong>
								    </div>
								    <div class="form-group mx-sm-3 mb-2">							    
								        <div class="form-group mb-1">
								             <strong><label for="staticEmail2"><small style="font-weight:bold;">From: </small></label> </strong>
								        </div>
								        <div class="form-row">
								          <div class="form-group col-md-7 mb-1">
								              <input type="text" id="fromDeliveryDate" class="form-control form-control-sm" name="dd_start_date" value="<?php echo $dd_start_date; ?>"  size="10" placeholder="mm/dd/yyyy">
								          </div>
								        </div>
								        <div class="form-group mb-1">
								            <strong> <label for="staticEmail2"><small style="font-weight:bold;">To: </small></label> </strong>
								        </div>
								        <div class="form-row">
								            <div class="form-group col-md-7 mb-1">
								              <input type="text" id="toDeliveryDate" class="form-control form-control-sm" name="dd_end_date"  value="<?php echo $dd_end_date; ?>" size="10" placeholder="mm/dd/yyyy">
								            </div>
								            <div class="form-group col-md-4 mb-1">
								               <button id="deliveryButton" type="submit" name="delivery_date" value="submit" class="btn btn-primary btn-sm">Filter</button>
								            </div>
								        </div>							
								    </div>   
								</form>
							</div>
							<div class="col-md-4">	

								<div class="form-group mb-4">
								     <strong><label for="staticEmail2"><small style="font-weight:bold;">Dispatch Status: </small></label> </strong>	
								</div>

								<form id="dispatchStatusForm" action="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>" method="post">
									<div class="form-group mx-sm-12 mb-2">
										<div class="form-row">
											<div class="form-group col-md-4 mb-1">
											   	<?php echo $order_obj->dispatch_status_html($filter['dispatch_status']); ?> 
											</div>
											<div class="form-group col-md-4 mb-1">
											 	<button id="dispatchStatusButton" type="submit" name="dispatch_status_form" value="submit" class="btn btn-primary btn-sm">Filter</button>
											</div>	
										</div>							
									</div>
								</form>		
								<div class="form-group mb-1">								 
								    <div class="form-group mx-sm-3 mb-2">
										<div class="form-row">
											<div class="form-group col-md-7 mb-1">
											   	<strong><label for="staticEmail2"><small style="font-weight:bold;">Order Status:</small></label> </strong>	
											</div>
										</div>							
									</div>	
								</div>							
								<form id="orderStatusForm" action="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>" method="post">
									<div class="form-group mx-sm-12 mb-2">
										<div class="form-row">
											<div class="form-group col-md-4 mb-1">
											   	<?php echo $order_obj->order_status_html($filter['order_status']); ?> 	
											</div>
								            <div class="form-group col-md-4 mb-1">
										    	 <button id="orderStatusButton" type="submit" name="order_status_form" value="submit" class="btn btn-primary btn-sm">Filter</button>
										    </div>
										</div>							
									</div>		
								</form>	
							</div>
							<div class="col-sm-2">		 
								<strong><label for="staticEmail2"><small style="font-weight:bold;"> Search Store: </small></label> </strong>	
								<div class="form-group mx-sm-3 mb-2">
									<div class="form-row">
										<div class="form-group col-md-7">	
										    <input id="searchStoreName" name="search" class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">										  
										</div>
										<div class="form-group col-md-3">	
										   <button id="order_date_query" id="search_query" type="submit" class="btn btn-primary btn-sm">submit</button>
										</div>
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
				</form>
			</div>
	        <div class="table-responsive">
				<table id="orders_table" class="table table-striped">
					<thead>
					    <tr>
					      	<th scope="col">Operator Name</th>
					      	<th scope="col">Order No.</th>
					      	<th scope="col">Order Date.</th>
					      	<th scope="col">Delivery Date.</th>
					      	<th scope="col">Order Amount.</th>
					      	<th scope="col">Order Amount in AUD.</th>
					      	<th scope="col">Pay to Florist</th>	
					      	<th scope="col"> % </th>	
					      	<th scope="col">Dispatch Status</th>
					      	<th scope="col">Notes</th>	
					      	<th scope="col">Fraud Score</th> 
					      	<th scope="col">Store Name</th>   
					      	<th scope="col">Order Status</th>     	 
					    </tr>
					</thead>
					<tbody>
					 <?php
					
						 	if(empty($orders['orders'])){
						 		echo $output = $order_obj->order_table_no_result();
						 	}

						 	foreach($orders['orders'] as $order){
						 		if($filter['search']){
			 						$florist_id = meta_data_parameter($order->meta_data, 'shop_order_mbh_assign_florist');
									if($florist_set['florist']['id'] == $florist_id){
									?>
									<tr>
						          		<td> <?php echo $order_obj::operator_assign($order->meta_data); ?></td>
						          		<td> <a class="link" href="<?php echo url_for('/admin/orders/order-assign.php?id='.$order->id); ?>"> <?php echo $order->number; ?> </a> </td>
						          		<td> <?php echo month_day_year($order->date_created_gmt); ?></td>
						          		<td ><?php echo $order_obj::get_meta_data($order->meta_data); ?></td> 
						          		<td ><?php echo phil_money_currency_format($order->total); ?></td> 
						          		<td ><?php echo $order_obj->get_currecny_aud($order->meta_data); ?></td> 
						          		<td ><?php echo $order_obj->shop_order_pay_to_florist($order->meta_data); ?></td> 
						          		<td > <?php echo $order_obj->get_margin($order->total, $order_obj->shop_order_pay_to_florist_int($order->meta_data) ); ?> </td>
						          		<td> <?php echo dispatch_status($order->meta_data, $order_obj::DISPATCH_STATUS); ?> </td>	          		
						          		<td ><?php echo $order->id; ?></td>
						          		<td> </td>
						          		<td ><?php echo  $order_obj->store_name_assign_florist($order->meta_data); ?></td>
						          		<td ><?php echo $order->status; ?></td>
						        	</tr>
									<?php
									}					
								}elseif($filter['order_date']){
									if( empty($orders['orders']) ){
										echo $order_obj->order_table_no_result();
									}elseif(!empty($order)){
										echo $order_obj->orders_table($order);								
									}						
								}elseif($filter['delivery_date']){
									echo $order_obj->order_delivery_date_filter($order, $dd_start_date, $dd_end_date);
								}elseif($filter['dispatch_status_form']){
									echo $order_obj->dispatch_status_filter($order, $filter['dispatch_status']);
								}elseif($filter['order_status_form']){
									echo $order_obj->order_status_filter($order, $filter['order_status']);
								}
							}

						?>
				   </tbody>
				</table>
			</div>	
        </div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<script>
	$(document).ready(function(){
		$("#orderDateButton").click(function(){
		 	$("form#orderDateForm").submit();
		});

		$("#deliveryButton").click(function(){
		 	$("form#deliveryDateForm").submit();
		});

		$("#dispatchStatusButton").click(function(){
		 	$("form#dispatchStatusForm").submit();
		});

		$("#orderStatusForm").click(function(){
		 	$("form#orderStatusButton").submit();
		});

		// $("input[name=search_query]").click(function(){
		// 	alert();
		// 	// $("form#pageLength").submit();
		// });
	});
</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>