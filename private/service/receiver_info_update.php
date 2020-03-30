<?php

require_once('../../private/initialize.php');

if(isset($_POST['update_receiver_info']) && !empty($_POST['update_receiver_info'] == "update")){

	$order_id = $_POST['receiver_modal_order_id'];
	$customer_id = $_POST['receiver_customer_id'];

	$shipping=[
		'first_name' => $_POST['receiver_first_name'],
		'last_name' => $_POST['receiver_last_name'],
		'company' => $_POST['receiver_company'],
		'address_1' => $_POST['receiver_address_1'],
		'address_2' => $_POST['receiver_address_2'],
		'city' => $_POST['receiver_city'],
		'state' => $_POST['receiver_state'],
		'postcode' => $_POST['receiver_postal_code_zip'],
		'phone' => $_POST['receiver_phone']
	];

	$meta_data=[
		array(
			'key' => '_shipping_phone',
			'value' => $_POST['receiver_phone']
		),
		array(
			'key' => 'shipping_facebook',
			'value' => $_POST['shipping_im_facebook']
		),
		array(
			'key' => 'shipping_wechat',
			'value' => $_POST['shipping_im_wechat']
		),
		array(
			'key' => 'shipping_whatsapp',
			'value' => $_POST['shipping_im_whatsapp']
		),
		array(
			'key' => 'shipping_skype',
			'value' => $_POST['shipping_im_skype']
		),
		array(
			'key' => 'shipping_viber',
			'value' => $_POST['shipping_im_viber']
		)
	];

	$data=[
		'shipping' => $shipping,
		'meta_data' => $meta_data
	];

	$shipping_update = $wc_api->put('orders/'.$order_id, $data);

	if($customer_id!=0){
		if($shipping_update){
			$customer_update = $wc_api->put('customers/'.$customer_id, $data);
		}
	}

}

