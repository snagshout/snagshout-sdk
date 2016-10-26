'use strict';

var SnagshoutClient = require('../src/SnagshoutClient');

SnagshoutClient(
    'PUBLIC_ID',
    'PRIVATE_KEY'
)
  .then(function (client) {
    return client.default.get_api_v1_campaigns({}, {});
  })
  .then(function (response) {
    console.log('Cool deals from the web:');

    response.obj.data.forEach(function (campaign) {
      console.log('- ' + campaign.product.name);
    })
  })
  .catch(function (error) {
    console.error(error);
  });
