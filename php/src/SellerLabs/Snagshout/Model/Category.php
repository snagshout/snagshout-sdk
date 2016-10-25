<?php

namespace SellerLabs\Snagshout\Model;

class Category
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $shortName;
    /**
     * @var string
     */
    protected $imageUrl;
    /**
     * @var int
     */
    protected $totalOffers;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }
    /**
     * @param string $shortName
     *
     * @return self
     */
    public function setShortName($shortName = null)
    {
        $this->shortName = $shortName;
        return $this;
    }
    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
    /**
     * @param string $imageUrl
     *
     * @return self
     */
    public function setImageUrl($imageUrl = null)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }
    /**
     * @return int
     */
    public function getTotalOffers()
    {
        return $this->totalOffers;
    }
    /**
     * @param int $totalOffers
     *
     * @return self
     */
    public function setTotalOffers($totalOffers = null)
    {
        $this->totalOffers = $totalOffers;
        return $this;
    }
}