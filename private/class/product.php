<?php

class Product{

	public $img_src=[];
	// public $product_image="";

	function getProducts(){
		global $wc_api;

		$result = $wc_api->get('products');
		$lastResponse = $wc_api->http->getResponse();
		$headers = $lastResponse->getHeaders();
		$product_total_pages = $headers['x-wp-total'];
		/** get all the total score products */
		$result = $wc_api->get('products', $parameter = ['per_page' => $product_total_pages ]);
		return $result;
	}

	public static function buildList($product){
		return self::product_build_list($product);
	}

	public static function build_list($product){
		return self::product_build_list($product);
	}

	public static function image($product){
		return self::images($product);
	}

	public static function images($product){

		if(!array($product)){
			$product_image = $product->images[0]->src;
		}else{
			foreach($product->images as $key => $value)
			{
				$img_src = $value->src;
				$product_image = $img_src;
			}
		}
		return $product_image;
	}	

	public static function product_build_list($product_object)
	{
		foreach($product_object as $key => $value)
		{	
			if($key == "meta_data")
			{
				foreach($value as $meta_key => $meta_data_value)
				{
					if($meta_data_value->key == 'mb_invoice_content' || $meta_data_value->key == 'mb_product_content')
					{
						return $meta_data_value->value;
					}			
				}
			}
		}
	}
}
$products_obj = New Product();