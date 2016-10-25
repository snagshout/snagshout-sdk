<?php

namespace SellerLabs\Snagshout\Model;

class Campaign
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $note;
    /**
     * @var string
     */
    protected $country;
    /**
     * @var string[]
     */
    protected $shoutChannels;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $shortUrl;
    /**
     * @var string
     */
    protected $availability;
    /**
     * @var string
     */
    protected $startsAt;
    /**
     * @var string
     */
    protected $endsAt;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var Product
     */
    protected $product;
    /**
     * @var Promotion[]
     */
    protected $promotions;
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
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
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
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * @param string $country
     *
     * @return self
     */
    public function setCountry($country = null)
    {
        $this->country = $country;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getShoutChannels()
    {
        return $this->shoutChannels;
    }
    /**
     * @param string[] $shoutChannels
     *
     * @return self
     */
    public function setShoutChannels(array $shoutChannels = null)
    {
        $this->shoutChannels = $shoutChannels;
        return $this;
    }
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }
    /**
     * @return string
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }
    /**
     * @param string $shortUrl
     *
     * @return self
     */
    public function setShortUrl($shortUrl = null)
    {
        $this->shortUrl = $shortUrl;
        return $this;
    }
    /**
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }
    /**
     * @param string $availability
     *
     * @return self
     */
    public function setAvailability($availability = null)
    {
        $this->availability = $availability;
        return $this;
    }
    /**
     * @return string
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }
    /**
     * @param string $startsAt
     *
     * @return self
     */
    public function setStartsAt($startsAt = null)
    {
        $this->startsAt = $startsAt;
        return $this;
    }
    /**
     * @return string
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }
    /**
     * @param string $endsAt
     *
     * @return self
     */
    public function setEndsAt($endsAt = null)
    {
        $this->endsAt = $endsAt;
        return $this;
    }
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @param Product $product
     *
     * @return self
     */
    public function setProduct(Product $product = null)
    {
        $this->product = $product;
        return $this;
    }
    /**
     * @return Promotion[]
     */
    public function getPromotions()
    {
        return $this->promotions;
    }
    /**
     * @param Promotion[] $promotions
     *
     * @return self
     */
    public function setPromotions(array $promotions = null)
    {
        $this->promotions = $promotions;
        return $this;
    }
}