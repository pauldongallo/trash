<?php

require __DIR__ . '../../../vendor/autoload.php';

use Automattic\WooCommerce\Client;

$wc_api = new Client(
    'http://mabuhayflowersbeta.websavii.com', 
    'ck_d821a38859a4b58b90f6dd3207ec7c2545e20405', 
    'cs_1d1a48d56ac2a28e5dfde654c4f9307aa1326dfe',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true 
    ]
);

?>



