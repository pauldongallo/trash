<?php
require_once('../../private/initialize.php');

if(!empty($_POST['update_order_info'] == "update")){

	// 2019-04-10T10:07:04
	$order_id = $_POST['order_id_delivery_date'];

	$order_delivery_date = $_POST['order_delivery_date'];
	$strtotime = strtotime($order_delivery_date);
	//$ord_date_format = date("Y-m-d", $strtotime);
 	//$delivery = epoch_to_human_read_date_no_dash($ord_date_format);
	$wc_orders = $wc_api->get('orders/'.$order_id);
	$myArray = json_decode(json_encode($wc_orders), true);

	foreach($myArray['meta_data'] as $key => $under_meta)
	{	
		foreach($under_meta as $k => $attribute)
		{
			if($attribute == '_orddd_lite_timestamp')
			{
				$myArray['meta_data'][$key]['value'] = $strtotime;
			}
		}
	}
	$shipping_update = $wc_api->put('orders/'.$order_id, $myArray);

}

