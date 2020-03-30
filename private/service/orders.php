<?php

if(is_post_request()){

	$page_length   = $_POST['page_length'] ?? '';
	$or_start_date = $_POST['or_start_date'] ?? today_date_datepicker_format();
	$or_end_date   = $_POST['or_end_date'] ?? today_date_datepicker_format();
	$dd_start_date = $_POST['dd_start_date'] ?? '';
	$dd_end_date = $_POST['dd_end_date'] ?? '';
	
	$filter=[];
	$filter['order_date'] = $_POST['order_date'] ?? '';
	$filter['delivery_date'] = $_POST['delivery_date'] ?? '';
	$filter['search'] = $_POST['search'] ?? '';
	$filter['dispatch_status'] = $_POST['dispatch_status'] ?? '';
	$filter['dispatch_status_form'] = $_POST['dispatch_status_form'] ?? '';
	$filter['order_status'] = $_POST['order_status_dash'] ?? '';
	$filter['order_status_form'] = $_POST['order_status_form'] ?? '';

	// if($filter['search']){
	// $florist_set = $florist::find_florist_chart($filter['search']);
	// 	$orders = $order_obj::get_orders_page_search();
	// } else {
	// 	$orders = $order_obj::get_orders_page($page_length, $or_start_date, $or_end_date);
	// }
	// $between_dd_date = show_delivery_date($dd_start_date, $dd_end_date);

	if( $filter['order_date'] == 'submit' ){
		$orders = $order_obj::get_orders_date($or_start_date, $or_end_date);
	}elseif($filter['delivery_date'] == 'submit'){
		$orders = $order_obj::get_orders_page_search();
	}elseif($filter['dispatch_status_form'] == 'submit'){
		$orders = $order_obj::get_orders_page_search();
	}elseif($filter['order_status_form'] == 'submit'){
		$orders = $order_obj::get_orders_page_search();
	}

}else{

	$filter=[];
	$filter['dispatch_status'] = '';
	$filter['order_status'] = '';
	$filter['search'] = $_POST['search'] = "";

	$or_start_date = today_date_datepicker_format();
	$or_end_date = today_date_datepicker_format();
	$dd_start_date = today_date_datepicker_format();
	$dd_end_date = today_date_datepicker_format();

	$orders = $order_obj::get_orders_page($order_obj::DEFAULT_PAGE, $or_start_date, $or_end_date);
	// $between_dd_date = show_delivery_date($dd_start_date, $dd_end_date);

}
