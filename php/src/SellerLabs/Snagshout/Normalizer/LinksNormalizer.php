<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class LinksNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Links') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Links) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Links();
        if (property_exists($data, 'prev')) {
            $object->setPrev($data->{'prev'});
        }
        if (property_exists($data, 'next')) {
            $object->setNext($data->{'next'});
        }
        if (property_exists($data, 'page')) {
            $object->setPage($data->{'page'});
        }
        if (property_exists($data, 'last')) {
            $object->setLast($data->{'last'});
        }
        if (property_exists($data, 'limit')) {
            $object->setLimit($data->{'limit'});
        }
        if (property_exists($data, 'total')) {
            $object->setTotal($data->{'total'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getPrev()) {
            $data->{'prev'} = $object->getPrev();
        }
        if (null !== $object->getNext()) {
            $data->{'next'} = $object->getNext();
        }
        if (null !== $object->getPage()) {
            $data->{'page'} = $object->getPage();
        }
        if (null !== $object->getLast()) {
            $data->{'last'} = $object->getLast();
        }
        if (null !== $object->getLimit()) {
            $data->{'limit'} = $object->getLimit();
        }
        if (null !== $object->getTotal()) {
            $data->{'total'} = $object->getTotal();
        }
        return $data;
    }
}