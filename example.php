<?php

date_default_timezone_set('UTC');

require_once 'vendor/autoload.php';

use GuzzleHttp\Psr7\Uri;
use SellerLabs\Snagshout\SyndicationClient;

$client = new SyndicationClient(
    "886faadcc003fdcd436ec649d646bf007b66befac1c28757974f75756e1aa99fc591df9785837e32ee06b6c60af6e8795dfe6947a6aa19cbf808cbb905a7ebea",
    "6ddb27eb2832cc3be4dc204e0b5ebc4efdcd1fc08d21778cef78555e99244c31bb80a181855606004418d159a9d8517bacb13d3e733954730991f629effb4571"
);

$client->setEndpoint(new Uri('http://localhost'));

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
