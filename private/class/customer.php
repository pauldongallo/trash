<?php

require_once(CLASS_PATH.'/order.php');

Class Customer{

	function find_id($id){
		global $wc_api;

		$result = $wc_api->get('customers/'.$id);
		return $result;
	}

	function get_last_purchased($id){
		$last_purchased = array();
		$orders = Order::get_all_orders();
		foreach($orders as $value){
			if($id == $value->customer_id){
				$last_purchased[] = month_day_year($value->date_created);
			}
		}
		$trim_array = reset($last_purchased);
		$date_readable = $trim_array;
		$date_readable;
		return $date_readable;
	}

	function customer_orders_sent($email){
		$email_temp = array();
		
		$orders = Order::get_all_orders();
		foreach($orders as $value){
			if($email == $value->billing->email){
				$email_temp[] = $value->billing->email;
			}
		}

		$count = count($email_temp);
		return $count;
	}

	function customer_orders_received($email){
		$shipping_email_temp = array();
		$billing_email = $email;

		$orders = Order::get_all_orders();
		foreach($orders as $key => $value){
			$shipping_emails = Order::wc_orders_meta($orders[$key]);
			foreach($shipping_emails as $shipping_email){
				if($billing_email==$shipping_email){
					$shipping_email_temp[]=$shipping_email;
				}
			}	
		}

		$count = count($shipping_email_temp);
		return $count;
	}

}


$customer = New Customer();