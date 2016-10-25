<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AmazonDataNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\AmazonData') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\AmazonData) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\AmazonData();
        if (property_exists($data, 'asin')) {
            $object->setAsin($data->{'asin'});
        }
        if (property_exists($data, 'merchantId')) {
            $object->setMerchantId($data->{'merchantId'});
        }
        if (property_exists($data, 'fulfillment')) {
            $object->setFulfillment($data->{'fulfillment'});
        }
        if (property_exists($data, 'starRating')) {
            $object->setStarRating($data->{'starRating'});
        }
        if (property_exists($data, 'numReviews')) {
            $object->setNumReviews($data->{'numReviews'});
        }
        if (property_exists($data, 'productId')) {
            $object->setProductId($data->{'productId'});
        }
        if (property_exists($data, 'childAsins')) {
            $values = array();
            foreach ($data->{'childAsins'} as $value) {
                $values[] = $value;
            }
            $object->setChildAsins($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getAsin()) {
            $data->{'asin'} = $object->getAsin();
        }
        if (null !== $object->getMerchantId()) {
            $data->{'merchantId'} = $object->getMerchantId();
        }
        if (null !== $object->getFulfillment()) {
            $data->{'fulfillment'} = $object->getFulfillment();
        }
        if (null !== $object->getStarRating()) {
            $data->{'starRating'} = $object->getStarRating();
        }
        if (null !== $object->getNumReviews()) {
            $data->{'numReviews'} = $object->getNumReviews();
        }
        if (null !== $object->getProductId()) {
            $data->{'productId'} = $object->getProductId();
        }
        if (null !== $object->getChildAsins()) {
            $values = array();
            foreach ($object->getChildAsins() as $value) {
                $values[] = $value;
            }
            $data->{'childAsins'} = $values;
        }
        return $data;
    }
}