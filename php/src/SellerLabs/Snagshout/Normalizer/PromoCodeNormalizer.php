<?php

namespace SellerLabs\Snagshout\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class PromoCodeNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SellerLabs\\Snagshout\\Model\\PromoCode') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SellerLabs\Snagshout\Model\PromoCode) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SellerLabs\Snagshout\Model\PromoCode();
        if (property_exists($data, 'promoCode')) {
            $object->setPromoCode($data->{'promoCode'});
        }
        if (property_exists($data, 'oneTime')) {
            $object->setOneTime($data->{'oneTime'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getPromoCode()) {
            $data->{'promoCode'} = $object->getPromoCode();
        }
        if (null !== $object->getOneTime()) {
            $data->{'oneTime'} = $object->getOneTime();
        }
        return $data;
    }
}