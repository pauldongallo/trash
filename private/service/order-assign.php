<?php
// require_once(PRIVATE_PATH.'/initialize.php');
// require_once(CLASS_PATH.'/order.php');
require_once(CLASS_PATH.'/product.php');
require_once(CLASS_PATH.'/florist.php');

$dispatch_status = $order_obj::dispatch_status_order_assign($order_obj::DISPATCH_STATUS);

if(isset($_GET['id'])){
	$id = $_GET['id'];	
	$wc_orders = $wc_api->get('orders/'.$id);
	$order_status = Order::ORDER_STATUS;
} 

foreach($wc_orders as $key => $value ){ 
	
	if($key == 'billing')
	{ 
		 $orders['billing'][] = [
		 	'customer_id'	=> $wc_orders->customer_id,
		 	'first_name' 	=> $value->first_name,
		 	'last_name' 	=> $value->last_name,
		 	'company' 		=> $value->company,
		 	'address_1' 	=> $value->address_1,
		 	'address_2' 	=> $value->address_2,
		 	'city' 			=> $value->city,
		 	'state'			=> $value->state,
		 	'postcode'		=> $value->postcode,
		 	'country'		=> $value->country,
		 	'email'			=> $value->email,
		 	'phone'			=> $value->phone
		 ];
	}

	if($key == 'meta_data'){

		foreach($value as $meta_key => $meta_value)
    	{
    		if($meta_value->key == '_special_delivery_instruction'){
    			if( isset($meta_value->value) && !empty($meta_value->value) ){
    				$orders['special_instruction_key'] = $meta_value->key;
    				$orders['special_instruction'] = $meta_value->value;
    			}
    		} 

    		if($meta_value->key == '_orddd_lite_timestamp')
    		{
    			$orders['delivery_info'][] = [
    				'order_date' => month_day_year_time($wc_orders->date_created),
    				'delivery_date' => epoch_to_human_read_date($meta_value->value)
    				// 'delivery_date' => epoch_to_human_read_date_datepicker($meta_value->value)
    			];	
    			$orders['time_order_date'][] = [
    				'time_order_date' => date_time_format($wc_orders->date_created)
    			];	
    		}

    		if($meta_value->key =='shop_order_mbh_assign_agent'){
    			$orders['assign_agent']=$meta_value->value;
    		} 

    		if($meta_value->key =='shop_order_mbh_assign_agent_id'){
    			$orders['assign_agent_id']=$meta_value->value;
    		}

    		if($meta_value->key =='shop_order_mbh_dispatch_status'){
    			$orders['dispatch_status']=$meta_value->value;
    		} 

    		if($meta_value->key=='shop_order_mbh_assign_florist'){
    			$orders['assign_florist']=$meta_value->value;
    			$florist_current_id = $orders['assign_florist'];
    			$florists = $florist->getAllFlorist();
    		}

    		if($meta_value->key =='shop_order_mbh_pay_to_florist'){
    			$orders['agent_pay_to_florist'][]=[
    				'agent_pay_to_florist' => $meta_value->value
    			];
    		} 

    		if($meta_value->key =='shop_order_mbh_notes_agent'){
    			$orders['notes_agent'][]=[
    				'notes_agent' => $meta_value->value
    			];
    		}

			if($meta_value->key=='_billing_facebook'){
				$orders['billing_facebook'][] = [
					'billing_facebook' => $meta_value->value
				];
			}

			if($meta_value->key=='_billing_wechat'){
				$orders['billing_wechat'][] = [
					'billing_wechat' => $meta_value->value
				];
			}
			
			if($meta_value->key=='_billing_whatsapp'){
				$orders['billing_whatsapp'][] = [
					'billing_whatsapp' => $meta_value->value
				];
			}

			if($meta_value->key=='_billing_skype'){
				$orders['billing_skype'][] = [
					'billing_skype' => $meta_value->value
				];
			}

			if($meta_value->key=='_billing_viber'){
				$orders['billing_viber'][] = [
					'billing_viber' => $meta_value->value
				];
			}

			if($meta_value->key == '_shipping_phone')
			{
				$orders['shipping_phone'][] = [
					'phone' => $meta_value->value
				];		
			}

			if($meta_value->key=='shipping_facebook'){
				$orders['shipping_facebook'][] = [
					'shipping_facebook' => $meta_value->value
				];
			}

			if($meta_value->key=='shipping_wechat'){
				$orders['shipping_wechat'][] = [
					'shipping_wechat' => $meta_value->value
				];
			}

			if($meta_value->key=='shipping_whatsapp'){
				$orders['shipping_whatsapp'][] = [
					'shipping_whatsapp' => $meta_value->value
				];
			}

			if($meta_value->key=='shipping_skype'){
				$orders['shipping_skype'][] = [
					'shipping_skype' => $meta_value->value
				];
			}

			if($meta_value->key=='shipping_viber'){
				$orders['shipping_viber'][] = [
					'shipping_viber' => $meta_value->value
				];
			}

    	}
   	
	}

	if($key=='line_items'){
		foreach($value as $line => $line_items)
		{
			$product_name = $line_items->name;
		 	$orders['product_title'][] = [
				'product_name' => $product_name
			];

			foreach($line_items->meta_data as $meta_key => $meta_value)
			{
				if($meta_value->key == 'occasion' || $meta_value->key == 'occastion') 
				{
				 	$orders['occasion_type'][] = [
						'occasion' => $meta_value->value
					];
					break;
				}
			}

			$product_id = $line_items->product_id;
			$orders['product'] = [
				'product_id' => $product_id
			];

			$build_list = $products_obj::build_list($wc_api->get('products/'.$product_id));	// get the product build list	
			$orders['build_list'][] = [
				'build_list' => $build_list
			];

			$product_image = $products_obj::image($wc_api->get('products/'.$product_id));
			$orders['image'] = $product_image;

			foreach($line_items->meta_data as $meta_key => $meta_value)
			{

				if(is_object($meta_value->value)){
					foreach($meta_value->value as $om => $omval){

						if($om=='fields'){

							if(isset($omval->add_a_teddy_bear)){
								$add_a_tedy_bear = $omval->add_a_teddy_bear;
							} else {
								$add_a_tedy_bear = "";
							}

							if(isset($omval->add_a_chocolates)){
								$add_a_chocolates = $omval->add_a_chocolates;
							} else {
								$add_a_chocolates = "";
							}

							if(isset($omval->add_a_bottle_of_wine)){
								$add_a_bottle_of_wine = $omval->add_a_bottle_of_wine;
							} else {
								$add_a_bottle_of_wine = "";
							}

							if(isset($omval->add_a_balloon)){
								$add_a_balloon = $omval->add_a_balloon;
							} else {
								$add_a_balloon = "";
							}
							
							$orders['add_on_name'][]=[
								'add_a_tedy_bear' => $add_a_tedy_bear,
								'add_a_chocolates' => $add_a_chocolates,
								'add_a_bottle_of_wine'	=> $add_a_bottle_of_wine,
								'add_a_balloon'  => $add_a_balloon
							];

						}

						if($om=='ppom_option_price'){
							$json_decode = json_decode($omval);
							foreach($json_decode as $jkey => $jval)
							{
								// $jval->label."<br>";
								// $add_on_name = $jval->label;
								$add_on_price = $jval->price;
								$orders['add_on_price'][]=[
									'add_on_price' => $add_on_price
								];
							}
						}
					}
				}	
			}
			$orders['item_price'][] = [
				'price' => $line_items->price
			];
		}
	}

	if($key=='shipping_lines')
	{
		foreach($value as $shipping => $shipping_lines)
		{
			$method_title = $shipping_lines->method_title;
			$total = $shipping_lines->total;

			$orders['shipping_lines'][] = [
				'method_title' => $method_title,
				'total' => $total
			];
		}
		$orders;
	}

	if($key == 'shipping'){			
		$orders['shipping'][] = [
			'first_name' => $value->first_name,
			'last_name' 	=> $value->last_name,
			'company' 		=> $value->company,
		 	'address_1' 	=> $value->address_1,
		 	'address_2' 	=> $value->address_2,
		 	'city' 			=> $value->city,
		 	'state'			=> $value->state,
		 	'postcode'		=> $value->postcode,
		 	'country'		=> $value->country
		];
		$orders;
	}
} 

$orders['order_amount'][] = [
	'total' => $wc_orders->total
];

$orders['customer_notes'][] = [
	'message_on_card' => $wc_orders->customer_note
];

?>

