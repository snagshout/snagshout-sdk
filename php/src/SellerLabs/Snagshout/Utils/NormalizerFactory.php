<?php


namespace SellerLabs\Snagshout\Utils;

use SellerLabs\Snagshout\Normalizer\NormalizerFactory as BaseNormalizer;

/**
 * Class NormalizerFactory
 *
 * @package SellerLabs\Snagshout\Utils
 *
 * @author Eduardo Trujillo <ed@sellerlabs.com>
 */
class NormalizerFactory extends BaseNormalizer
{
    public static function create()
    {
        return array_merge(
            [new NullNormalizer()],
            parent::create()
        );
    }
}