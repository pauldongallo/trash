<?php
require_once('../../private/initialize.php');

if(!empty($_POST['update_message_on_card'] == "update")){

	echo $order_id = $_POST['order_id_message_on_card'];
	echo $message_on_card = $_POST['message_on_card'];
	$data=[
		'customer_note' => $message_on_card
	];
	$wc_api->put('orders/'.$order_id, $data);

}

