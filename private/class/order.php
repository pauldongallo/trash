<?php

Class Order{
	
	 const DELIVERY_DATE = 2;
	 const ORDER_DATE = 2;
	 const DEFAULT_PAGE = 20;
	 const LIMIT_LIST = 20;

	 var $array=array();

	 const STATUS_ACIN = [
	 	"active" 			=> "Active",
	 	"inactive" 			=> "Inactive",
	 ];

	 const ORDER_STATUS = [
	 	"cancelled" 			=> "Cancelled",
	 	"completed" 			=> "Completed",
	 	"failed"				=> "Failed",
	 	"on-hold"				=> "On Hold",
	 	"pending"				=>  "Pending Payment",
	 	"processing"			=> "Processing",
	 	"refunded"				=> "Refunded"
	 ];

	 const ORDER_STATUS_KEY= [
	 	"cancelled",
	 	"completed",
	 	"failed",
	 	"on-hold",
	 	"pending",
	 	"processing",
	 	"refunded"
	 ];

	 const DISPATCH_STATUS = [ 
	 	'1' => "Order Forwarded",
		'2' => 'Payment Confirmed',
		'3' => 'Delivery En Route',
		'4' => 'Delivered',
		'5' => 'Recipient Unavailable',
		'6' => 'Redelivery',
	 ];

	 public static function get_orders_page($limit, $or_start_date, $or_end_date){
		global $wc_api;
		// https://demo.dev.websavii.com/wp-json/wc/v3/orders?after=2019-09-01T15:19:21&before=2019-09-30T15:19:21
		$start = wp_gmtdate($or_start_date, "+00 hour +00 minutes");
		$end = wp_gmtdate($or_end_date, "+23 hour +59 minutes"); 

		$orders = $wc_api->get('orders', $parameters = [ 'per_page'=> $limit, 'after' => $start, 'before' => $end ]);
		
		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$orders_total_pages = $headers['X-WP-Total'];
		$data=[
			'orders' => $orders,
			'total_page' => $orders_total_pages
		];
		return $data;
	}

	public static function get_orders_date($or_start_date, $or_end_date){
		global $wc_api;
		// https://demo.dev.websavii.com/wp-json/wc/v3/orders?after=2019-09-01T15:19:21&before=2019-09-30T15:19:21
		$start = wp_gmtdate($or_start_date, "+00 hour +00 minutes");
		$end = wp_gmtdate($or_end_date, "+23 hour +59 minutes"); 	

		$wc_api->get('orders', $parameters = [ "per_page" => 1]);

		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$orders_total_pages = $headers['X-WP-Total'];

		$orders = $wc_api->get('orders', $parameters = [ "per_page" => $orders_total_pages, 'after' => $start, 'before' => $end ]);

		$data=[
			'orders' => $orders,
			'total_page' => $orders_total_pages
		];
		return $data;
	}

	public static function get_orders_page_search(){
		global $wc_api;

		$wc_api->get('orders', $parameters = [ "per_page" => 1]);
		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$orders_total_pages = $headers['X-WP-Total'];

		$orders = $wc_api->get('orders', $parameters = [ "per_page" => $orders_total_pages]);

		$data=[
			'orders' => $orders,
			'total_page' => $orders_total_pages
		];
		return $data;
	}

	public static function get_all_orders(){
		global $wc_api;

		$result = $wc_api->get('orders');
		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$orders_total_pages = $headers['X-WP-Total'];

		$result = $wc_api->get('orders', $parameter = ['per_page' => $orders_total_pages ]);
		return $result;
	}

	function find_orders_id_meta_au($id){
		global $wc_api;

		$orders = $wc_api->get('orders/'.$id);
		foreach($orders->meta_data as $key => $value){
			if($value->key == 'shop_currency_stat'){
				$meta_data=[
				   	array(
						'key' => $value->key,
						'value' => $value->value
					),
				];
				$data=[
					'meta_data'=> $meta_data
				];
			}
		}

		return $data;
	}

	function currencyConverter($fromCurrency,$toCurrency,$amount) {
		$fromCurrency = urlencode($fromCurrency);
		$toCurrency = urlencode($toCurrency);
		$url = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
		$get = file_get_contents($url);
		$data = preg_split('/\D\s(.*?)\s=\s/',$get);
		$exhangeRate = (float) substr($data[1],0,7);
		$convertedAmount = $amount*$exhangeRate;
		return "$ ".number_format($convertedAmount, 2, '.', ',');
	}

	function save_orders_aud_currency($id, $amount){
		global $wc_api;
		$data=[
		    "meta_data" => [
	    		array(
					'key' => 'shop_aud_currency',
					'value' => $amount
				),
				array(
					'key' => 'shop_currency_stat',
					'value' => 1
				),
		    ]   
		];
		$orders = $wc_api->put('orders/'.$id, $data);
		return $orders;
	}

	public static function wc_orders_meta($orders){
	 	$shipping_email=array();
	 	foreach($orders->meta_data as $key => $value){
	 		if($value->key=='_shipping_email'){
	 			$shipping_email[]=$value->value;
	 		}
	 	}
	 	return $shipping_email;
	}

	public static function get_currecny_aud($meta_data){
	 	$data=array();
	 	foreach($meta_data as $key => $value){
	 		if($value->key=='shop_aud_currency'){
	 			$data="$".$value->value;
	 		}
	 	}
	 	return $data;
	}

	// passing the object to array
	public static function dispatch_status($dispatch_status){	
		$array=[];
		foreach($dispatch_status as $key => $value){
			$array['dispatch_status'][$key]=$value; 
		}
		return $array;
	}

	// passing the object to array
	public static function dispatch_status_order_assign($dispatch_status){	
		foreach($dispatch_status as $key => $value){
			$array['dispatch_status'][$key]=$value; 
		}
		return $array;
	}

	function status_acin(){
		$output = "";
		$output .= "<select id='status_acin' class='form-control form-control-sm custom-select mr-sm-2'>";
		$output .= "<option value=''>---select---</option>";
		foreach(self::STATUS_ACIN as $key => $value){	
			$output .= "<option value='".$key."' >".$value."</option>";
		}
		$output .= "</select>";
		return  $output;
	}

	function dispatch_status_html($dispatch_status_dash){
		$output = "";
		$output .= "<select id='dispatch_status_dash' name='dispatch_status' class='form-control form-control-sm custom-select mr-sm-2'>";
		$output .= "<option value=''>---select---</option>";
		foreach(self::DISPATCH_STATUS as $key => $value){	
			if($dispatch_status_dash == $key){
				$output .= "<option value='".$key."' selected='selected' >".$value."</option>";
			}else{
				$output .= "<option value='".$key."' >".$value."</option>";
			}
		}
		$output .= "</select>";
		return  $output;
	}

	function order_status_html($order_status){
		$output = "";
		$output .= "<select id='orde_status_dash' name='order_status_dash' class='form-control form-control-sm custom-select mr-sm-2'>";
		$output .= "<option value=''>---select---</option>";
		foreach(self::ORDER_STATUS as $key => $value){	
			if($order_status == $key){
				$output .= "<option value='".$key."' selected='selected' >".$value."</option>";
			} else {
				$output .= "<option value='".$key."' >".$value."</option>";
			}
		}
		$output .= "</select>";
		return  $output;
	}

	/* 
	* Count the order sent
	*/
	function customer_order_sent($email, $orders){
		$order_sent_array = array();
		foreach($orders as $key => $value){
			if($email == $value->billing->email){
				$order_sent_array[]=$value->billing->email;	
			}
		}
		$count = count($order_sent_array);
		return $count;
	}

	/* 
	* count customer orders recieved
	*/
	function customer_orders_recieved($email, $totalPages){
		global $wc_api;

		$shipping_email_temp = array();

		$orders = $wc_api->get('orders', $parameters = ['per_page'=> $totalPages]);
		foreach($orders as $key => $val_orders){
			$shipping_email = self::wc_orders_meta($orders[$key]);		
			foreach($shipping_email as $shipping_email){
				if($email==$shipping_email){
					$shipping_email_temp[]=$shipping_email;
				}
			}	
		}
		$counts = count($shipping_email_temp);
		return $counts;
	}

	function save_currency_ph_au($id, $amount){
		$aud_currency_temp = array();
		$orders = self::find_orders_id_meta_au($id); // ok ani
		if($orders){
			foreach($orders['meta_data'] as $meta_data => $value){
				if($value['key']=="shop_currency_stat" && $value['value']==0){
					$new_orders = Order::save_orders_aud_currency($id, $amount);
				}
			}	
		}
		return $aud_currency_temp;
	}
	
	public static function getData($limit){
		global $wc_api;

		$orders = $wc_api->get('orders', $parameters = ['per_page'=> $limit]);
		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$orders_total_pages = $headers['X-WP-Total'];
		$data=[
			'orders' => $orders,
			'total_page' => $orders_total_pages
		];
		return $data;
	}

	/* 
	* To Do: The assign agent should be randomize 
	* 
	*/
	public static function operator_assign($meta_data)
	{
		$agent_assign="";

		foreach($meta_data as $key => $value)
		{
			if($value->key=="shop_order_mbh_assign_agent")
			{
				$agent_assign = $value->value;
				if($agent_assign==""){
					$agent_assign= "select operator";
				}
			}
		}

		return $agent_assign;
	}

	public static function get_meta_data($meta_data)
	{
		$data = array();
		foreach($meta_data as $key => $value)
		{
			if($value->key=="_orddd_lite_timestamp")
			{
				$epoch = epoch_to_human_read_date($value->value);
				$data = $epoch;
			}
		}
		return $data;
	}

	/* 
	* To Do : Pay to florist will calculate the price of that item
	* 
	*/
	public static function shop_order_pay_to_florist($meta_data)
	{
		foreach($meta_data as $key => $value)
		{
			if( !empty($value->key) && $value->key=="shop_order_mbh_pay_to_florist" )
			{
				 $price = $value->value;
				 if($price !== "update fields"){
				 	$price = (float)$price;
				 	$price = phil_money_currency_format($price);
				 } else {
				 	$price = 0;
				 	$price = phil_money_currency_format($price);
				 }
			}else{
				if(empty($price)){
					$price = 0;
					$price = phil_money_currency_format($price);
				}
			}
		}
		return $price;
	}

	/* 
	* To Do : Pay to florist will calculate the price of that item
	* 
	*/
	public static function shop_order_pay_to_florist_int($meta_data)
	{
		foreach($meta_data as $key => $value)
		{
			if( !empty($value->key) && $value->key=="shop_order_mbh_pay_to_florist" )
			{
				 $price = $value->value;
				 if($price !== "update fields"){
				 	$price = (float)$price;
				 	$price = $price;
				 } else {
				 	$price = 0;
				 	$price =$price;
				 }
			}else{
				if(empty($price)){
					$price = 0;
					$price = $price;
				}
			}
		}
		return $price;
	}

	/* 
	* To Do : Will assign florist automatically if these florist order multiple twice
	* 
	*/
	public static function store_name_assign_florist($meta_data)
	{
		foreach($meta_data as $key => $value)
		{
			if($value->key=="shop_order_mbh_assign_florist")
			{
				if(!empty($value->value)){
					$florist = New Florist();
					$florist = $florist->findID($value->value);
					$shop_order_store_name = $florist;
				}else{
					$shop_order_store_name = "select store";
				}
			}
		}
		return $shop_order_store_name;
	}

	public static function get_margin($total_amount, $thepay){
		// echo $thepay;
		if( $thepay!=0){
			$percentage = ($thepay*100)/$total_amount;
			$the_percentage = amount_decimal($percentage);
			$percent_profit = 100 - $the_percentage;
		}else {
			$percent_profit = 0;
		}
		return $percent_profit."%";
	}

	public static function orders_table($order){
		$output = "";
		$output .= "<tr>";
		$output .= "<td>".self::operator_assign($order->meta_data)."</td>";
		$output .= "<td><a class='link' href='".url_for('/admin/orders/order-assign.php?id='.$order->id)."'>".$order->number."</a></td>";	
		$output .= "<td>".month_day_year($order->date_created_gmt)."</td>";
		$output .= "<td>".month_day_year(meta_data_parameter($order->meta_data, "Delivery Date" ) )."</td>";
		$output .= "<td>".phil_money_currency_format($order->total)."</td>";
		$output .= "<td>".self::get_currecny_aud($order->meta_data)."</td>";
		$output .= "<td>".self::shop_order_pay_to_florist($order->meta_data)."</td>";
		$output .= "<td>".self::get_margin($order->total, self::shop_order_pay_to_florist_int($order->meta_data) )."</td>";
		$output .= "<td>".dispatch_status($order->meta_data, self::DISPATCH_STATUS)."</td>";
		$output .= "<td>".$order->id."</td>";
	    $output .= "<td></td>";      			
	    $output .= "<td>".self::store_name_assign_florist($order->meta_data)."</td>"; 
	    $output .= "<td>".$order->status."</td>"; 
	    $output .= "</tr>";
	    echo $output;
	}

	public static function order_table_no_result(){
		$output = "";
		$output .= "<tr>";
		$output .= "<td colspan='13'> no result found </td>";
		$output .= "</tr>";
		return $output;
	}

	public static function order_delivery_date_filter($order, $dd_start_date, $dd_end_date){
		foreach($order->meta_data as $data){
			if($data->key=="Delivery Date"){
				foreach( show_delivery_date( $dd_start_date, $dd_end_date ) as $key => $dd_date){
				    if( $dd_date->format('Y-m-d') == convert_char_to_ymd( $data->value ) ){
						 self::orders_table($order);												
					}
				}
			}
		}
	}

	public static function dispatch_status_filter($order, $dispatch_status){
		if( $dispatch_status == meta_data_parameter($order->meta_data, 'shop_order_mbh_dispatch_status') ){
			self::orders_table($order);
		}
	}

	public static function order_status_filter($order, $order_status){
		if($order->status == $order_status){	
			self::orders_table($order);
		}
	}

}

$order_obj = New Order();

