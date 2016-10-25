clean:
	rm -rf src/SellerLabs/Snagshout/Model
	rm -rf src/SellerLabs/Snagshout/Normalizer
	rm -rf src/SellerLabs/Snagshout/Resource

all:
	curl -o swagger.json http://localhost:8000/swagger.json
	php ../vendor/bin/jane-openapi generate
	rm swagger.json
