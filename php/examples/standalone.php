<?php

date_default_timezone_set('UTC');

// Here you can configure you client keys.
$publicId = 'PUBLIC_ID';
$secretKey = 'SECRET_KEY';

// As part of HMAC authentication, we need to provide a hash of our request
// using out secret key. Normally, the message hashed is the body of the HTTP
// request and the current date. However, given that we are performing a GET
// request, the body is empty, so we only hash the current timestamp.
$contentHash = hash_hmac(
    'sha512',
    (new DateTime())->format('Y-m-d H'),
    $secretKey
);

// Next, we begin setting up the Curl client (URI and headers).
$ch = curl_init("https://www.snagshout.com/api/v1/campaigns");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    vsprintf('Authorization: Hash %s', [$publicId]),
    vsprintf('Content-Hash: %s', [$contentHash]),
]);

// Finally, we perform the request and close the resource when we are done.
$result = curl_exec($ch);
curl_close($ch);

// To show something to the user, we dump the HTTP response.
var_dump($result);