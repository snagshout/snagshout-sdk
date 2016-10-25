<?php

namespace SellerLabs\Snagshout\Normalizer;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Joli\Jane\Runtime\Normalizer\ArrayDenormalizer();
        $normalizers[] = new V1GetStatusResponseNormalizer();
        $normalizers[] = new V1GetStatusNormalizer();
        $normalizers[] = new LinksNormalizer();
        $normalizers[] = new V1GetCampaignsResponseNormalizer();
        $normalizers[] = new CampaignNormalizer();
        $normalizers[] = new ProductNormalizer();
        $normalizers[] = new AmazonDataNormalizer();
        $normalizers[] = new CategoryNormalizer();
        $normalizers[] = new ImageNormalizer();
        $normalizers[] = new ImageMetadataNormalizer();
        $normalizers[] = new ShippingNormalizer();
        $normalizers[] = new AttributeNormalizer();
        $normalizers[] = new BookmarkMetadataNormalizer();
        $normalizers[] = new PromotionNormalizer();
        $normalizers[] = new PromoCodeNormalizer();
        $normalizers[] = new V1GetCategoriesResponseNormalizer();
        return $normalizers;
    }
}