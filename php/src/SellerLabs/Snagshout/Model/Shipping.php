<?php

namespace SellerLabs\Snagshout\Model;

class Shipping
{
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
    protected $id;
    /**
     * @var int
     */
    protected $daysMin;
    /**
     * @var int
     */
    protected $daysMax;
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
    public function getDaysMin()
    {
        return $this->daysMin;
    }
    /**
     * @param int $daysMin
     *
     * @return self
     */
    public function setDaysMin($daysMin = null)
    {
        $this->daysMin = $daysMin;
        return $this;
    }
    /**
     * @return int
     */
    public function getDaysMax()
    {
        return $this->daysMax;
    }
    /**
     * @param int $daysMax
     *
     * @return self
     */
    public function setDaysMax($daysMax = null)
    {
        $this->daysMax = $daysMax;
        return $this;
    }
}