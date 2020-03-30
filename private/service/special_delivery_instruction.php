<?php

require_once('../../private/initialize.php');

if(!empty($_POST['update_special_delivery_instruction'] == "update")){

	$order_id = $_POST['order_id_delivery_special_instruction'];
	$special_delivery_instruction = $_POST['special_delivery_instruction'];

	$data['meta_data'][]=[
		'key' => '_special_delivery_instruction',
		'value' => $special_delivery_instruction
	];

	$results = $wc_api->put('orders/'.$order_id, $data);
	if($results){
		$data=[
			'status' => "success"
		];
		echo json_encode($data);
	}
}

