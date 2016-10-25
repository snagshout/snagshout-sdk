<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CategoryNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Category') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Category) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Category();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'shortName')) {
            $object->setShortName($data->{'shortName'});
        }
        if (property_exists($data, 'imageUrl')) {
            $object->setImageUrl($data->{'imageUrl'});
        }
        if (property_exists($data, 'totalOffers')) {
            $object->setTotalOffers($data->{'totalOffers'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getShortName()) {
            $data->{'shortName'} = $object->getShortName();
        }
        if (null !== $object->getImageUrl()) {
            $data->{'imageUrl'} = $object->getImageUrl();
        }
        if (null !== $object->getTotalOffers()) {
            $data->{'totalOffers'} = $object->getTotalOffers();
        }
        return $data;
    }
}