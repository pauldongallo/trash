<?php
/**

list of function
current_page()
website_domain()

**/

require_once(CLASS_PATH.'/order.php');
require_once(CLASS_PATH.'/note.php');

function url_for($script_path){
	if($script_path[0] != '/'){
		$script_path = "/" . $script_path;
	}
	return WWW_ROOT . $script_path;
}

function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
} 

function dispatch_status($meta_data, $dispatch_status_option)
{
	$option = $dispatch_status_option;

	$dispatch_status = "no assign";
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_mbh_dispatch_status")
		{
			if($dispatch_status == ""){
				$dispatch_status="select status";
			}else{
				foreach($option as $key => $opt){
					if($key == $value->value){
						$dispatch_status = $opt;
					}
				}
			}
		} 
	}
	return $dispatch_status;
}

/*
* To Do : 
* Sample format :
*	02/04/2019 03:26:00 - OPERATOR ASSIGNED
*	Assigned Operator: * Kerby Decierdo
*/
function notes_agent($meta_data, $order_id)
{	
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_mbh_notes_agent")
		{
			$shop_order_store_name = $value->value;
			$notes_agent['notes_agent']=[
				'order_id' => $order_id,
				'note_id' => $value->id,
				'key' => $value->key,
				'note_content' => $value->value,
			];
			if($shop_order_store_name == ""){
				$notes_agent['notes_agent'] = [
					'order_id' => $order_id,
					'note_id' => $value->id,
					'key' => $value->key,
					'note_content' => "write notes here",
				];
			} 
		} else {
			$notes_agent['notes_agent']=[
				'order_id' => 0,
				'note_id' => 0,
				'key' => '',
				'note_content' => 'write note here',
			];
		}
	}
	
	return $notes_agent['notes_agent'];
}


function get_meta_data2($meta_data)
{
	$data = array();
	foreach($meta_data as $key => $value)
	{
		if($value->key=="shop_order_store_name")
		{	
			$data[] = $value->value;
		}

	}
	return $data;
}

function today_date_datepicker_format(){
	$currentDateTime = date('m/d/Y');
    return $currentDateTime;
}

/* today date */
function current_date(){
	$currentDateTime = date('Y-m-d H:i:s');
	$date = DateTime::createFromFormat('Y-m-d', $currentDateTime);
	return $date->format('m-d-Y');
}

function month_day_year_numeric($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('m-d-Y ');
}

/* format May-20-2019 */
function month_day_year($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('M-d-Y');
}

function month_day_year_plain($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('M d Y');
}

function month_day_year_time($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('M-d-Y');
}

function date_time_format($date){
	$strtotime = strtotime($date);
	$date_str = date('Y-m-d', $strtotime);
	$date = DateTime::createFromFormat('Y-m-d', $date_str);
	return $date->format('h:i A');
}

function epoch_to_human_read_date($epoch_timestamp)
{
	$time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	// the output will 2019-03-05
	// then you are now safe to crate output date format for human readable
	$date = DateTime::createFromFormat('Y-m-d', $time_stamp);
	return $date->format('M-d-Y');
}

function epoch_to_human_read_date_no_dash($epoch_timestamp)
{
	// $time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	// the output will 2019-03-05
	// then you are now safe to crate output date format for human readable
	$date = DateTime::createFromFormat('Y-m-d', $epoch_timestamp);
	return $date->format('M d Y');
}

function epoch_to_human_read_date_datepicker($epoch_timestamp)
{
	$time_stamp = date("Y-m-d", $epoch_timestamp); // data from epochtimestamp 1551744000
	$date = DateTime::createFromFormat('Y-m-d', $time_stamp);
	return $date->format('m/d/Y');
}

function phil_money_currency_format($amount_array)
{	
	return "₱ ".number_format($amount_array, 2, '.', ',');
}

function amount_decimal($decimal){
	return number_format($decimal, 2, '.', ',');
}

function currencyConverter($fromCurrency,$toCurrency,$amount) {
	$fromCurrency = urlencode($fromCurrency);
	$toCurrency = urlencode($toCurrency);
	$url = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
	$get = file_get_contents($url);
	$data = preg_split('/\D\s(.*?)\s=\s/',$get);
	$exhangeRate = (float) substr($data[0],0,7);
	$convertedAmount = $amount*$exhangeRate;
	return "$ ".number_format($convertedAmount, 2, '.', ',');
}

function clean_comma($string)
{
	return str_replace($string);
}

function debug($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request(){
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function wp_gmtdate($or_start_date, $add_hours = ""){
	$totime_or = strtotime($or_start_date);
	$add_hours_time = strtotime($add_hours, $totime_or);
	return gmdate("Y-m-d\TH:i:s", $add_hours_time);
}

function dd_monthchar_yy($dd_start_date){
	$totime_or = strtotime($dd_start_date);
	$date = date('j F, Y', $totime_or);
	return $date;
}

function convert_char_to_ymd($char_date){
	$startotime_date = strtotime($char_date);
	$date = date('Y-m-d', $startotime_date );
	return $date;
}

function show_delivery_date($dd_start_date, $dd_end_date){

	$format = 'Y-m-d';
	$totimestart = strtotime($dd_start_date);
	$date_start = date('Y-m-d', $totimestart);
	$date_start_dd = DateTime::createFromFormat($format, $date_start);
	$dd_start_date_frmt = $date_start_dd->format('Y-m-d');
	$dd_start_date_dt = new DateTime( $dd_start_date_frmt );

	$totimeend= strtotime($dd_end_date);
	$date_end = date('Y-m-d', $totimeend);
	$date_end_dd = DateTime::createFromFormat($format, $date_end);
	$dd_end_date_frmt = $date_end_dd->format('Y-m-d');
	$dd_end_date_dt = new DateTime( $dd_end_date_frmt );
	$period = new DatePeriod( $dd_start_date_dt, new DateInterval('P1D'), $dd_end_date_dt );
	return $period;
}

function meta_data_parameter($meta_data, $parameter){

	$data=[];
	if($meta_data){
		foreach($meta_data as $key => $value)
		{
			if($value->key==$parameter && $value->value != "" )
			{	
				// var_dump($value->value);
				$data = $value->value;
			}
		}
	}
	return $data;
}

function site_domain_public($paraemter){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
	    $link = "https"; 
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
	} else {
	  	$link = "http"; 
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
	}
	return $link.'/public'.$paraemter;
}

function current_page(){
	return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
