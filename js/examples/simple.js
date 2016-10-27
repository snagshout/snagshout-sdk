'use strict';

var SnagshoutClient = require('../src/SnagshoutClient');

// We begin by constructing an instance of the client. This will pull the
// latest Swagger spec from GitHub, and dynamically build a client. It returns
// a promise that when resolved provides an instance to the generated client.
SnagshoutClient(
    'PUBLIC_ID',
    'PRIVATE_KEY'
)
.then(function (client) {
  // All API methods can be called by first using the resource name and then
  // the operation name.
  //
  // Examples:
  //
  // - client.campaign.getCampaigns
  // - client.category.getCategories
  // - client.front.getStatus
  //
  return client.campaign.getCampaigns({}, {});
})
.then(function (response) {
  // Below we print out a subset of all the information returned by the
  // response. To see everything returned, try console.log(response).
  console.log('Cool deals from the web:');

  response.obj.data.forEach(function (campaign) {
    console.log('- ' + campaign.product.name);
  })
})
.catch(function (error) {
  console.error(error);
});
