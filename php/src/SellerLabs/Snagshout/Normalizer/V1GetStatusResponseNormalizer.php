<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class V1GetStatusResponseNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\V1GetStatusResponse') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\V1GetStatusResponse) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\V1GetStatusResponse();
        if (property_exists($data, 'errors')) {
            $values = array();
            foreach ($data->{'errors'} as $value) {
                $values[] = $value;
            }
            $object->setErrors($values);
        }
        if (property_exists($data, 'error')) {
            $object->setError($data->{'error'});
        }
        if (property_exists($data, 'code')) {
            $object->setCode($data->{'code'});
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'message')) {
            $object->setMessage($data->{'message'});
        }
        if (property_exists($data, 'success')) {
            $object->setSuccess($data->{'success'});
        }
        if (property_exists($data, 'data')) {
            $object->setData($this->serializer->deserialize($data->{'data'}, 'SellerLabs\\Snagshout\\Model\\V1GetStatus', 'raw', $context));
        }
        if (property_exists($data, 'links')) {
            $object->setLinks($this->serializer->deserialize($data->{'links'}, 'SellerLabs\\Snagshout\\Model\\Links', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getErrors()) {
            $values = array();
            foreach ($object->getErrors() as $value) {
                $values[] = $value;
            }
            $data->{'errors'} = $values;
        }
        if (null !== $object->getError()) {
            $data->{'error'} = $object->getError();
        }
        if (null !== $object->getCode()) {
            $data->{'code'} = $object->getCode();
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        }
        if (null !== $object->getMessage()) {
            $data->{'message'} = $object->getMessage();
        }
        if (null !== $object->getSuccess()) {
            $data->{'success'} = $object->getSuccess();
        }
        if (null !== $object->getData()) {
            $data->{'data'} = $this->serializer->serialize($object->getData(), 'raw', $context);
        }
        if (null !== $object->getLinks()) {
            $data->{'links'} = $this->serializer->serialize($object->getLinks(), 'raw', $context);
        }
        return $data;
    }
}