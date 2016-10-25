<?php

date_default_timezone_set('UTC');

require_once __DIR__ . '/../../vendor/autoload.php';

use SellerLabs\Snagshout\Client;

$client = new Client(
    "PUBLIC_ID",
    "PRIVATE_KEY"
);

var_export(
    $client
        ->v1()
        ->getApiV1Campaign([
            //'type' => 'syndicated',
        ])
);
