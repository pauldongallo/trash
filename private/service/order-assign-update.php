<?php
require_once('../../private/initialize.php');

if(isset($_POST['update_assign'])){

	$order_id = $_POST['order_id'];

	$assign_operator = $_POST['operator_output'];
	$get_operator = $_POST['get_operator'];

	$get_operator_name = $_POST['get_operator_name'];

	if(empty($get_operator_name)){
		$get_operator_name = $_POST['assign_operator_name'];
		$set_operator = $get_operator_name;
	}else{
		$set_operator = $get_operator_name;
	}

	$dispatch_status = $_POST['dispatch_status'];
	$assign_florist = $_POST['assign_florist'];
	$agent_pay_to_florist = $_POST['agent_pay_to_florist'];
	// $notes_agent = $_POST['notes_agent'];

	$data = [ 
		'status' => $_POST['status'] 
	];

	$data['meta_data']=[		
		array(
			'key' => 'shop_order_mbh_assign_agent',
			'value' => $set_operator
		),
		array(
			'key' => 'shop_order_mbh_assign_agent_id',
			'value' => $assign_operator
		),
		array(
			'key' => 'shop_order_mbh_dispatch_status',
			'value' => $dispatch_status
		),
		array(
			'key' => 'shop_order_mbh_assign_florist',
			'value' => $assign_florist
		),
		array(
			'key' => 'shop_order_mbh_pay_to_florist',
			'value' => $agent_pay_to_florist
		)
		// ,
		// array(
		// 	'key' => 'shop_order_mbh_notes_agent',
		// 	'value' => $notes_agent
		// )
	];

	$result = $wc_api->put('orders/'.$order_id, $data);
	if($result)
	{
		redirect_to( url_for('../public/admin/orders/order-assign.php?id='.$result->id, true, 301) );
	}
} 	


?>

