<?php

namespace SellerLabs\Snagshout\Model;

class PromoCode
{
    /**
     * @var string
     */
    protected $promoCode;
    /**
     * @var bool
     */
    protected $oneTime;
    /**
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }
    /**
     * @param string $promoCode
     *
     * @return self
     */
    public function setPromoCode($promoCode = null)
    {
        $this->promoCode = $promoCode;
        return $this;
    }
    /**
     * @return bool
     */
    public function getOneTime()
    {
        return $this->oneTime;
    }
    /**
     * @param bool $oneTime
     *
     * @return self
     */
    public function setOneTime($oneTime = null)
    {
        $this->oneTime = $oneTime;
        return $this;
    }
}