<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class PromotionNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\Promotion') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\Promotion) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\Promotion();
        if (property_exists($data, 'restriction')) {
            $object->setRestriction($data->{'restriction'});
        }
        if (property_exists($data, 'note')) {
            $object->setNote($data->{'note'});
        }
        if (property_exists($data, 'price')) {
            $object->setPrice($data->{'price'});
        }
        if (property_exists($data, 'dailyLimit')) {
            $object->setDailyLimit($data->{'dailyLimit'});
        }
        if (property_exists($data, 'id')) {
            $object->setId($data->{'id'});
        }
        if (property_exists($data, 'snaggedToday')) {
            $object->setSnaggedToday($data->{'snaggedToday'});
        }
        if (property_exists($data, 'snaggableQuantity')) {
            $object->setSnaggableQuantity($data->{'snaggableQuantity'});
        }
        if (property_exists($data, 'badges')) {
            $values = array();
            foreach ($data->{'badges'} as $value) {
                $values[] = $value;
            }
            $object->setBadges($values);
        }
        if (property_exists($data, 'elegible')) {
            $object->setElegible($data->{'elegible'});
        }
        if (property_exists($data, 'promoCode')) {
            $object->setPromoCode($this->serializer->deserialize($data->{'promoCode'}, 'SellerLabs\\Snagshout\\Model\\PromoCode', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getRestriction()) {
            $data->{'restriction'} = $object->getRestriction();
        }
        if (null !== $object->getNote()) {
            $data->{'note'} = $object->getNote();
        }
        if (null !== $object->getPrice()) {
            $data->{'price'} = $object->getPrice();
        }
        if (null !== $object->getDailyLimit()) {
            $data->{'dailyLimit'} = $object->getDailyLimit();
        }
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        }
        if (null !== $object->getSnaggedToday()) {
            $data->{'snaggedToday'} = $object->getSnaggedToday();
        }
        if (null !== $object->getSnaggableQuantity()) {
            $data->{'snaggableQuantity'} = $object->getSnaggableQuantity();
        }
        if (null !== $object->getBadges()) {
            $values = array();
            foreach ($object->getBadges() as $value) {
                $values[] = $value;
            }
            $data->{'badges'} = $values;
        }
        if (null !== $object->getElegible()) {
            $data->{'elegible'} = $object->getElegible();
        }
        if (null !== $object->getPromoCode()) {
            $data->{'promoCode'} = $this->serializer->serialize($object->getPromoCode(), 'raw', $context);
        }
        return $data;
    }
}