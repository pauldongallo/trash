<?php

require_once('../../private/initialize.php');

if(isset($_POST['update_sender_info']) && !empty($_POST['update_sender_info'] == "update")){

	$order_id = $_POST['modal_order_id'];
	$customer_id = $_POST['sender_customer_id'];

	$data['billing']=[
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'company' => $_POST['company'],
		'country' => $_POST['country_base'],
		'address_1' => $_POST['address_1'],
		'address_2' => $_POST['address_2'],
		'city' => $_POST['city'],
		'state' => $_POST['country_state'],
		'postcode' => $_POST['postal_code_zip'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone']
	];

	$customer=[
		'first_name' 	=>  $_POST['first_name'],
		'last_name' 	=>	$_POST['last_name'],
		'email' 	=>	$_POST['email'],
		'billing' => $data['billing']
	];
	
	$data['meta_data']=[
		array(
			'key' => '_billing_facebook',
			'value' => $_POST['billing_im_facebook']
		),
		array(
			'key' => '_billing_wechat',
			'value' => $_POST['billing_im_wechat']
		),
		array(
			'key' => '_billing_whatsapp',
			'value' => $_POST['billing_im_whatsapp']
		),
		array(
			'key' => '_billing_skype',
			'value' => $_POST['billing_im_skype']
		),
		array(
			'key' => '_billing_viber',
			'value' => $_POST['billing_im_viber']
		)
	];

	$billing_update = $wc_api->put('orders/'.$order_id, $data);

	if($customer_id!=0){
		if($billing_update){
			$customer_update = $wc_api->put('customers/'.$customer_id, $customer);
		}
	}
}

