#!/bin/bash

echo "Building the Swagger server..."
stack build

echo "Starting the Swagger server in the background..."
stack exec openapi &

echo "Waiting (3 sec)..."
sleep 3

echo "Fetching Swagger JSON spec..."
curl -o swagger.json http://localhost:8000/swagger.json

echo "Killing Swagger server..."
killall openapi

echo "Copying Swagger spec to docs..."
cp swagger.json ../docs/

echo "Generating proxy version of the Swagger spec..."
sed -e 's/www.snagshout.com/proxy.snagshout.com/' ../docs/swagger.json > ../docs/swagger-proxy.json
