<?php

namespace SellerLabs\Snagshout\Model;

class Promotion
{
    /**
     * @var string
     */
    protected $restriction;
    /**
     * @var string
     */
    protected $note;
    /**
     * @var string
     */
    protected $price;
    /**
     * @var int
     */
    protected $dailyLimit;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $snaggedToday;
    /**
     * @var int
     */
    protected $snaggableQuantity;
    /**
     * @var string[]
     */
    protected $badges;
    /**
     * @var bool
     */
    protected $elegible;
    /**
     * @var PromoCode
     */
    protected $promoCode;
    /**
     * @return string
     */
    public function getRestriction()
    {
        return $this->restriction;
    }
    /**
     * @param string $restriction
     *
     * @return self
     */
    public function setRestriction($restriction = null)
    {
        $this->restriction = $restriction;
        return $this;
    }
    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * @param string $note
     *
     * @return self
     */
    public function setNote($note = null)
    {
        $this->note = $note;
        return $this;
    }
    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @param string $price
     *
     * @return self
     */
    public function setPrice($price = null)
    {
        $this->price = $price;
        return $this;
    }
    /**
     * @return int
     */
    public function getDailyLimit()
    {
        return $this->dailyLimit;
    }
    /**
     * @param int $dailyLimit
     *
     * @return self
     */
    public function setDailyLimit($dailyLimit = null)
    {
        $this->dailyLimit = $dailyLimit;
        return $this;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int
     */
    public function getSnaggedToday()
    {
        return $this->snaggedToday;
    }
    /**
     * @param int $snaggedToday
     *
     * @return self
     */
    public function setSnaggedToday($snaggedToday = null)
    {
        $this->snaggedToday = $snaggedToday;
        return $this;
    }
    /**
     * @return int
     */
    public function getSnaggableQuantity()
    {
        return $this->snaggableQuantity;
    }
    /**
     * @param int $snaggableQuantity
     *
     * @return self
     */
    public function setSnaggableQuantity($snaggableQuantity = null)
    {
        $this->snaggableQuantity = $snaggableQuantity;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getBadges()
    {
        return $this->badges;
    }
    /**
     * @param string[] $badges
     *
     * @return self
     */
    public function setBadges(array $badges = null)
    {
        $this->badges = $badges;
        return $this;
    }
    /**
     * @return bool
     */
    public function getElegible()
    {
        return $this->elegible;
    }
    /**
     * @param bool $elegible
     *
     * @return self
     */
    public function setElegible($elegible = null)
    {
        $this->elegible = $elegible;
        return $this;
    }
    /**
     * @return PromoCode
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }
    /**
     * @param PromoCode $promoCode
     *
     * @return self
     */
    public function setPromoCode(PromoCode $promoCode = null)
    {
        $this->promoCode = $promoCode;
        return $this;
    }
}