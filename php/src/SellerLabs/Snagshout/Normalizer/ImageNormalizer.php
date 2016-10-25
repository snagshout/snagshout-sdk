<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ImageNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Image') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Image) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Image();
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'title')) {
            $object->setTitle($data->{'title'});
        }
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'sort')) {
            $object->setSort($data->{'sort'});
        }
        if (property_exists($data, 'featured')) {
            $object->setFeatured($data->{'featured'});
        }
        if (property_exists($data, 'metadata')) {
            $object->setMetadata($this->serializer->deserialize($data->{'metadata'}, 'SellerLabs\\Snagshout\\Model\\ImageMetadata', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getTitle()) {
            $data->{'title'} = $object->getTitle();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getSort()) {
            $data->{'sort'} = $object->getSort();
        }
        if (null !== $object->getFeatured()) {
            $data->{'featured'} = $object->getFeatured();
        }
        if (null !== $object->getMetadata()) {
            $data->{'metadata'} = $this->serializer->serialize($object->getMetadata(), 'raw', $context);
        }
        return $data;
    }
}