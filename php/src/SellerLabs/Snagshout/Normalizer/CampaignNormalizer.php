<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CampaignNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Campaign') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Campaign) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Campaign();
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
        }
        if (property_exists($data, 'note')) {
            $object->setNote($data->{'note'});
        }
        if (property_exists($data, 'country')) {
            $object->setCountry($data->{'country'});
        }
        if (property_exists($data, 'shoutChannels')) {
            $values = array();
            foreach ($data->{'shoutChannels'} as $value) {
                $values[] = $value;
            }
            $object->setShoutChannels($values);
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'shortUrl')) {
            $object->setShortUrl($data->{'shortUrl'});
        }
        if (property_exists($data, 'availability')) {
            $object->setAvailability($data->{'availability'});
        }
        if (property_exists($data, 'startsAt')) {
            $object->setStartsAt($data->{'startsAt'});
        }
        if (property_exists($data, 'endsAt')) {
            $object->setEndsAt($data->{'endsAt'});
        }
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
        }
        if (property_exists($data, 'product')) {
            $object->setProduct($this->serializer->deserialize($data->{'product'}, 'SellerLabs\\Snagshout\\Model\\Product', 'raw', $context));
        }
        if (property_exists($data, 'promotions')) {
            $values_1 = array();
            foreach ($data->{'promotions'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'SellerLabs\\Snagshout\\Model\\Promotion', 'raw', $context);
            }
            $object->setPromotions($values_1);
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
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getNote()) {
            $data->{'note'} = $object->getNote();
        }
        if (null !== $object->getCountry()) {
            $data->{'country'} = $object->getCountry();
        }
        if (null !== $object->getShoutChannels()) {
            $values = array();
            foreach ($object->getShoutChannels() as $value) {
                $values[] = $value;
            }
            $data->{'shoutChannels'} = $values;
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getShortUrl()) {
            $data->{'shortUrl'} = $object->getShortUrl();
        }
        if (null !== $object->getAvailability()) {
            $data->{'availability'} = $object->getAvailability();
        }
        if (null !== $object->getStartsAt()) {
            $data->{'startsAt'} = $object->getStartsAt();
        }
        if (null !== $object->getEndsAt()) {
            $data->{'endsAt'} = $object->getEndsAt();
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        }
        if (null !== $object->getProduct()) {
            $data->{'product'} = $this->serializer->serialize($object->getProduct(), 'raw', $context);
        }
        if (null !== $object->getPromotions()) {
            $values_1 = array();
            foreach ($object->getPromotions() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'promotions'} = $values_1;
        }
        return $data;
    }
}