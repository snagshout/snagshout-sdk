'use strict';

var Swagger = require('swagger-client');
var HmacSHA512 = require('crypto-js/hmac-sha512');
var moment = require('moment');

var SnagshoutRequestSigner = function(publicId, secretKey) {
  this.publicId = publicId;
  this.secretKey = secretKey;
};

SnagshoutRequestSigner.prototype.apply = function (obj, authorizations) {
  var message = [
    obj.body ? obj.body : '',
    moment().utc().format('Y-MM-DD HH'),
  ].join('');

  obj.headers["authorization"] = 'Hash ' + this.publicId;
  obj.headers['content-hash']
    = HmacSHA512(message, this.secretKey)
    .toString();

  return true;
};

module.exports = function (publicId, secretKey) {
  return new Swagger({
    url: 'https://sellerlabs.github.io/snagshout-sdk/swagger.json',
    usePromise: true,
  })
  .then(function (client) {
    client.clientAuthorizations.add('hmac', new SnagshoutRequestSigner(
      publicId,
      secretKey
    ));

    return client;
  });
};

