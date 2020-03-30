<?php
require_once('../../private/initialize.php');

require_once(CLASS_PATH.'/order.php');
require_once(CLASS_PATH.'/continents.php');

$customers = $wc_api->get('orders', $parameters = ['per_page'=>'50']);

$lastResponse = $wc_api->http->getResponse();
$headers = $lastResponse->getHeaders();
$totalPages = $headers['X-WP-Total'];

foreach($customers as $key => $value){
	$data[]= [
		'id' => $value->id,
		'full_name' => $value->billing->first_name." ".$value->billing->last_name,
		'first_name' => $value->billing->first_name,
		'last_name' => $value->billing->last_name,
		'company' => $value->billing->company,
		'address_1' => $value->billing->address_1,
		'address_2' => $value->billing->address_2,
		'city' => $value->billing->city,
		'state' => $value->billing->state,
		'postcode' => $value->billing->postcode,
		'country' => $value->billing->country,
		'email' => $value->billing->email,
		'phone' => $value->billing->phone,		
		'shipping_country' => $value->shipping->country,
		'date_created' => month_day_year_plain($value->date_created),
		'orders_sent' => "",	
		'orders_recieved' => "",		
	];
}
$new_data = unique_multidim_array($data,'email');

foreach($new_data as $va){

	$orders_sent = $wc_api->get('orders', $parameters = ['per_page'=> $totalPages]);
	$customer_order_sent = $order_obj->customer_order_sent( $va['email'], $orders_sent);

	$data2['data'][] = [
		'id' => $va['id'],
		'full_name' => $va['full_name'],
		'first_name' => $va['first_name'],
		'last_name' => $va['last_name'],
		'company' => $va['company'],
		'address_1' => $va['address_1'],
		'address_2' => $va['address_2'],
		'city' => $va['city'],
		'state' => $va['state'],
		'postcode' => $va['postcode'],
		'country' => $continents->getCountryName($va['country']),
		'email' => $va['email'],
		'phone' => $va['phone'],
		'shipping_country' => $continents->getCountryName($va['shipping_country']),
		'date_created' => $va['date_created'],
		'orders_sent' => $customer_order_sent,	
		'orders_recieved' => $order_obj->customer_orders_recieved($va['email'], $totalPages),
	];
}
echo json_encode($data2);

