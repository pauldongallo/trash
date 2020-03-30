<?php
require_once('../initialize.php');

if (isset($_POST['selectData'])) {
  	// $countries = $wc_api->get('data/countries/'.$_POST['selectData']);
  	$countries = $wc_api->get('data/countries/'.$_POST['selectData']);
  	echo json_encode($countries, true);
}

?>