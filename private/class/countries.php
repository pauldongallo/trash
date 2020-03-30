<?php
require_once('../initialize.php');
$countries = $wc_api->get('data/countries');
echo json_encode($countries);
?>