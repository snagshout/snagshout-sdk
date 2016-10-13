<?php

date_default_timezone_set('UTC');

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Psr7\Uri;
use SellerLabs\Snagshout\SyndicationClient;

$client = new SyndicationClient(
    "664d41ab7fc244b016b440e7e2a3a76c5a4fd5e0f91b451133f706d2a5c455f8b4c49386781305b1fbffcdd5713dc4c951295d3eb040c19f7d1c20d3152e1dc1",
    "4b1af292dfc0412b34f4ef3ab0f91d98ea63c2ce849bbaf87337c79845591aa8a98947a986d66a412789cff9f117e2dc988659b8d2e65972091b5f134195debf"
);

$client->setEndpoint(new Uri('http://localhost'));

var_dump($client
    ->getCampaigns(['query' => [
        'embeds' => 'product.amazonData,promotions',
        'type' => 'syndicated',
    ]])
    ->getBody()
    ->getContents());
