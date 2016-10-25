<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ImageMetadataNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\ImageMetadata') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\ImageMetadata) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\ImageMetadata();
        if (property_exists($data, 'original_src')) {
            $object->setOriginalSrc($data->{'original_src'});
        }
        if (property_exists($data, 'small')) {
            $object->setSmall($data->{'small'});
        }
        if (property_exists($data, 'medium')) {
            $object->setMedium($data->{'medium'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getOriginalSrc()) {
            $data->{'original_src'} = $object->getOriginalSrc();
        }
        if (null !== $object->getSmall()) {
            $data->{'small'} = $object->getSmall();
        }
        if (null !== $object->getMedium()) {
            $data->{'medium'} = $object->getMedium();
        }
        return $data;
    }
}