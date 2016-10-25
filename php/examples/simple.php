<?php

date_default_timezone_set('UTC');

require_once __DIR__ . '/../../vendor/autoload.php';

use SellerLabs\Snagshout\Client;

$client = new Client(
    "b6824d25898b93387146c6d8842a9234c371b0c11471891bb042dc882e2dfe12264cd7b699db35272a7033184b440d3534234e673613bf13b35d1ebfee69a12c",
    "121ad4b2459d7c5aaefcac7c090abc9ff44acc1ab7c1d936e7a699d576f3a8abac104307540d38ebe814d66176d40b46e32327b65cc8e8e34ef640e219e0e81e"
);

var_export(
    $client
        ->v1()
        ->getApiV1Campaign([
            //'type' => 'syndicated',
        ])
);
