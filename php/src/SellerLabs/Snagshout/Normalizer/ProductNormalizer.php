<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ProductNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Product') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Product) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Product();
        if (property_exists($data, 'externalUrl')) {
            $object->setExternalUrl($data->{'externalUrl'});
        }
        if (property_exists($data, 'marketplace')) {
            $object->setMarketplace($data->{'marketplace'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'keywords')) {
            $object->setKeywords($data->{'keywords'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'ean')) {
            $object->setEan($data->{'ean'});
        }
        if (property_exists($data, 'currency')) {
            $object->setCurrency($data->{'currency'});
        }
        if (property_exists($data, 'price')) {
            $object->setPrice($data->{'price'});
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'amazonData')) {
            $object->setAmazonData($this->serializer->deserialize($data->{'amazonData'}, 'SellerLabs\\Snagshout\\Model\\AmazonData', 'raw', $context));
        }
        if (property_exists($data, 'mainCategory')) {
            $object->setMainCategory($this->serializer->deserialize($data->{'mainCategory'}, 'SellerLabs\\Snagshout\\Model\\Category', 'raw', $context));
        }
        if (property_exists($data, 'featuredImage')) {
            $object->setFeaturedImage($this->serializer->deserialize($data->{'featuredImage'}, 'SellerLabs\\Snagshout\\Model\\Image', 'raw', $context));
        }
        if (property_exists($data, 'media')) {
            $values = array();
            foreach ($data->{'media'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'SellerLabs\\Snagshout\\Model\\Image', 'raw', $context);
            }
            $object->setMedia($values);
        }
        if (property_exists($data, 'shipping')) {
            $values_1 = array();
            foreach ($data->{'shipping'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SellerLabs\\Snagshout\\Model\\Shipping', 'raw', $context);
            }
            $object->setShipping($values_1);
        }
        if (property_exists($data, 'attributes')) {
            $values_2 = array();
            foreach ($data->{'attributes'} as $value_2) {
                $values_2[] = $this->serializer->deserialize($value_2, 'SellerLabs\\Snagshout\\Model\\Attribute', 'raw', $context);
            }
            $object->setAttributes($values_2);
        }
        if (property_exists($data, 'bookmarkedBy')) {
            $object->setBookmarkedBy($this->serializer->deserialize($data->{'bookmarkedBy'}, 'SellerLabs\\Snagshout\\Model\\BookmarkMetadata', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getExternalUrl()) {
            $data->{'externalUrl'} = $object->getExternalUrl();
        }
        if (null !== $object->getMarketplace()) {
            $data->{'marketplace'} = $object->getMarketplace();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getKeywords()) {
            $data->{'keywords'} = $object->getKeywords();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getEan()) {
            $data->{'ean'} = $object->getEan();
        }
        if (null !== $object->getCurrency()) {
            $data->{'currency'} = $object->getCurrency();
        }
        if (null !== $object->getPrice()) {
            $data->{'price'} = $object->getPrice();
        }
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getAmazonData()) {
            $data->{'amazonData'} = $this->serializer->serialize($object->getAmazonData(), 'raw', $context);
        }
        if (null !== $object->getMainCategory()) {
            $data->{'mainCategory'} = $this->serializer->serialize($object->getMainCategory(), 'raw', $context);
        }
        if (null !== $object->getFeaturedImage()) {
            $data->{'featuredImage'} = $this->serializer->serialize($object->getFeaturedImage(), 'raw', $context);
        }
        if (null !== $object->getMedia()) {
            $values = array();
            foreach ($object->getMedia() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'media'} = $values;
        }
        if (null !== $object->getShipping()) {
            $values_1 = array();
            foreach ($object->getShipping() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'shipping'} = $values_1;
        }
        if (null !== $object->getAttributes()) {
            $values_2 = array();
            foreach ($object->getAttributes() as $value_2) {
                $values_2[] = $this->serializer->serialize($value_2, 'raw', $context);
            }
            $data->{'attributes'} = $values_2;
        }
        if (null !== $object->getBookmarkedBy()) {
            $data->{'bookmarkedBy'} = $this->serializer->serialize($object->getBookmarkedBy(), 'raw', $context);
        }
        return $data;
    }
}