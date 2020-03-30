<?php
//require_once('../class/wc-api-client.php');

Class Continents{

	function getCountryName($parameter){
		global $wc_api;
		$result = $wc_api->get('data/countries/'.$parameter);
		$country_name = $result->name;
		return $country_name;
	} 

	function getCountryState($country, $state){
		global $wc_api;

		$countries = $wc_api->get('data/countries/'.$country);
		foreach($countries->states as $value){
			if($state==$value->code){
				$state=$value->name;
			}
		}
		return $state;
	}

}

$continents = new Continents();

?>