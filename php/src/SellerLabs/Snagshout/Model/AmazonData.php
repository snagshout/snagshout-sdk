<?php

namespace SellerLabs\Snagshout\Model;

class AmazonData
{
    /**
     * @var string
     */
    protected $asin;
    /**
     * @var string
     */
    protected $merchantId;
    /**
     * @var string
     */
    protected $fulfillment;
    /**
     * @var int
     */
    protected $starRating;
    /**
     * @var int
     */
    protected $numReviews;
    /**
     * @var int
     */
    protected $productId;
    /**
     * @var string[]
     */
    protected $childAsins;
    /**
     * @return string
     */
    public function getAsin()
    {
        return $this->asin;
    }
    /**
     * @param string $asin
     *
     * @return self
     */
    public function setAsin($asin = null)
    {
        $this->asin = $asin;
        return $this;
    }
    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }
    /**
     * @param string $merchantId
     *
     * @return self
     */
    public function setMerchantId($merchantId = null)
    {
        $this->merchantId = $merchantId;
        return $this;
    }
    /**
     * @return string
     */
    public function getFulfillment()
    {
        return $this->fulfillment;
    }
    /**
     * @param string $fulfillment
     *
     * @return self
     */
    public function setFulfillment($fulfillment = null)
    {
        $this->fulfillment = $fulfillment;
        return $this;
    }
    /**
     * @return int
     */
    public function getStarRating()
    {
        return $this->starRating;
    }
    /**
     * @param int $starRating
     *
     * @return self
     */
    public function setStarRating($starRating = null)
    {
        $this->starRating = $starRating;
        return $this;
    }
    /**
     * @return int
     */
    public function getNumReviews()
    {
        return $this->numReviews;
    }
    /**
     * @param int $numReviews
     *
     * @return self
     */
    public function setNumReviews($numReviews = null)
    {
        $this->numReviews = $numReviews;
        return $this;
    }
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }
    /**
     * @param int $productId
     *
     * @return self
     */
    public function setProductId($productId = null)
    {
        $this->productId = $productId;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getChildAsins()
    {
        return $this->childAsins;
    }
    /**
     * @param string[] $childAsins
     *
     * @return self
     */
    public function setChildAsins(array $childAsins = null)
    {
        $this->childAsins = $childAsins;
        return $this;
    }
}