<?php

date_default_timezone_set('UTC');

require_once __DIR__ . '/../../vendor/autoload.php';

use SellerLabs\Snagshout\SyndicationClient;

$client = new SyndicationClient(
    "PUBLIC_ID",
    "PRIVATE_KEY"
);

var_export(json_decode(
    $client
        ->getCampaigns(['query' => [
            'embeds' => 'product.amazonData,promotions',
            'type' => 'syndicated',
        ]])
        ->getBody()
        ->getContents(),
    true
));
