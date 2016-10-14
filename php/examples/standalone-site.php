<?php

date_default_timezone_set('UTC');

$onlySyndicated = function () {
    return isset($_GET['type'])
        && $_GET['type'] === 'syndicated';
};

$needsConfig = function () {
    return !(
        isset($_GET['public_id'])
        && isset($_GET['secret_key'])
        && $_GET['public_id']
        && $_GET['secret_key']
    );
};

$getDeals = function () use ($onlySyndicated) {
    $publicId = $_GET['public_id'];
    $secretKey = $_GET['secret_key'];

    // Generate content hash.
    $contentHash = hash_hmac(
        'sha512',
        (new DateTime())->format('Y-m-d H'),
        $secretKey
    );

    // Next, we begin setting up the Curl client (URI and headers).
    $endpoint
        = isset($_GET['endpoint']) && $_GET['endpoint']
        ? $_GET['endpoint']
        : 'https://www.snagshout.com';

    $query = $onlySyndicated() ? '?type=syndicated' : '';

    $ch = curl_init(vsprintf("%s/api/v1/campaigns%s", [$endpoint, $query]));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        vsprintf('Authorization: Hash %s', [$publicId]),
        vsprintf('Content-Hash: %s', [$contentHash]),
    ]);

    // Finally, we perform the request and close the resource when we are done.
    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
};

?>

<html>
<head>
    <title>Syndication SDK Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="small-12 medium-8 medium-offset-2 columns">
                <h1>
                    Syndication SDK Example<br>
                </h1>
                <h2>
                    <span class="subheader">
                        <small>The best deals on the interwebz.</small>
                    </span>
                </h2>
            </div>
        </div>

        <?php if($needsConfig()) { ?>
            <div class="row">
                <div class="small-12 medium-8 medium-offset-2 columns">
                    <hr>

                    <form>
                        <div class="row">
                            <div class="medium-6 columns">
                                <label>Public ID
                                    <input
                                        name="public_id"
                                        type="text"
                                        placeholder="XXXXXXX">
                                </label>
                            </div>
                            <div class="medium-6 columns">
                                <label>Secret Key
                                    <input
                                        name="secret_key"
                                        type="text"
                                        placeholder="XXXXXXX">
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="medium-8 columns">
                                <label>Endpoint (Optional)
                                    <input
                                        name="endpoint"
                                        type="text"
                                        placeholder="https://www.snagshout.com">
                                </label>
                            </div>
                            <fieldset class="large-4 columns">
                                <legend>Deal Type</legend>
                                <input
                                    type="radio"
                                    name="type"
                                    value="all"
                                    id="typeAll"
                                    checked
                                    required>
                                <label for="typeAll">All</label>
                                <input
                                    type="radio"
                                    name="type"
                                    value="syndicated"
                                    id="typeSyndicated">
                                <label for="typeSyndicated">Syndicated</label>
                            </fieldset>
                        </div>

                        <div class="row">
                            <div class="small-12 columns text-right">
                                <button type="submit" class="success button">
                                    Load deals
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="small-12 medium-8 medium-offset-2 columns">
                    <hr>

                    <?php if ($onlySyndicated()) { ?>
                        <h4>Syndicated deals:</h4>
                    <?php } else { ?>
                        <h4>Available deals:</h4>
                    <?php } ?>

                    <div class="row small-up-1 medium-up-2 large-up-3">
                        <?php foreach(($getDeals())['data'] as $campaign) { ?>
                        <div class="column">
                            <div class="callout">
                                <img
                                    src="<?php echo $campaign['product']['featuredImage']['url'] ?>"
                                    class="thumbnail"
                                    alt="">
                                <h6><?php echo $campaign['name'] ?></h6>
                                <p>
                                    <small>
                                        <?php echo $campaign['description'] ?>
                                    </small>
                                </p>
                                <?php if (isset($campaign['promotions'][0]['promoCode']['promoCode'])) { ?>
                                    <code><?php echo $campaign['promotions'][0]['promoCode']['promoCode'] ?></code>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
