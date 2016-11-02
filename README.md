# Snagshout SDK

The Snagshout SDK is a collection of libraries and code examples that allow
developers to build applications and websites that make use of the Snagshout
platform API.

## API Specification

As part of this SDK, we include a Swagger/OpenAPI specification of the API
methods available to our partners. This specification can be used to
automatically generate client libraries for many languages, and as a reference
point for anyone interacting with the API.

- **Swagger JSON:** https://sellerlabs.github.io/snagshout-sdk/swagger.json

- **Swagger UI:** The UI provides a graphical interface to explore the
  specification. You can use it to lookup the parameter and response types
  supported by each method. Note: While it supports making interactive
  requests, the Snagshout API does not currently have the required CORS headers
  to allow for interactive consoles to make requests:
  https://sellerlabs.github.io/snagshout-sdk/

## Partner Authentication

Partner accounts can authenticate against the API by using their public ID and
secret keys. These are used on every API request using the `Authorization` and
`Content-Hash` HTTP headers:

```http
GET /api/v1/status HTTP/1.1
Host: www.snagshout.com
Accept: application/json
Authorization: Hash PUBLIC_ID
Content-Hash: CONTENT_HASH

```

In the example above, `PUBLIC_ID` should be the partner's public ID, and
`CONTENT_HASH` should be a HMAC SHA-512 computed hash. For `GET` requests, the
hashed message only contains a date/time format, since there is no message body,
while `POST` requests use the message body string concatenated with the
date/time format.

The date/time format is `YYYY-MM-DD HH` and should be in UTC. See examples
below on how to generate it on PHP and JS.

In PHP, the HMAC hashing function is conveniently built-in to the language, so
we can compute a hash as follows:

```php
$contentHash = hash_hmac(
  'sha512',
  $requestBody . gmdate('Y-m-d H'),
  $secretKey
);
```

In JavaScript, we need to include some external libraries to compute the hash
(moment.js and crypto.js):

```js
var HmacSHA512 = require('crypto-js/hmac-sha512');
var moment = require('moment');

var message = [
  requestBody ? requestBody : '',
  moment().utc().format('Y-MM-DD HH'),
].join('');

var contentHash
  = HmacSHA512(message, this.secretKey)
  .toString();
```
## Supported languages

- PHP ([Documentation][php-docs], [Source][php-src], [Examples][php-examples])
- JavaScript ([Documentation][js-docs], [Source][js-src],
  [Examples][js-examples])

## License

This repository is licensed under the Apache 2.0 license. Please refer to the
`LICENSE` file for more information.

[php-docs]: https://sellerlabs.github.io/snagshout-sdk/php/
[php-src]: https://github.com/sellerlabs/snagshout-sdk/tree/master/php/src
[php-examples]: https://github.com/sellerlabs/snagshout-sdk/tree/master/php/examples

[js-docs]: https://github.com/sellerlabs/snagshout-sdk/tree/master/js#readme
[js-src]: https://github.com/sellerlabs/snagshout-sdk/tree/master/js/src
[js-examples]: https://github.com/sellerlabs/snagshout-sdk/tree/master/js/examples
