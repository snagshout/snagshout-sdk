<?php

namespace SellerLabs\Snagshout\Model;

class Product
{
    /**
     * @var string
     */
    protected $externalUrl;
    /**
     * @var string
     */
    protected $marketplace;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $keywords;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $ean;
    /**
     * @var string
     */
    protected $currency;
    /**
     * @var string
     */
    protected $price;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var AmazonData
     */
    protected $amazonData;
    /**
     * @var Category
     */
    protected $mainCategory;
    /**
     * @var Image
     */
    protected $featuredImage;
    /**
     * @var Image[]
     */
    protected $media;
    /**
     * @var Shipping[]
     */
    protected $shipping;
    /**
     * @var Attribute[]
     */
    protected $attributes;
    /**
     * @var BookmarkMetadata
     */
    protected $bookmarkedBy;
    /**
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }
    /**
     * @param string $externalUrl
     *
     * @return self
     */
    public function setExternalUrl($externalUrl = null)
    {
        $this->externalUrl = $externalUrl;
        return $this;
    }
    /**
     * @return string
     */
    public function getMarketplace()
    {
        return $this->marketplace;
    }
    /**
     * @param string $marketplace
     *
     * @return self
     */
    public function setMarketplace($marketplace = null)
    {
        $this->marketplace = $marketplace;
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
    public function getKeywords()
    {
        return $this->keywords;
    }
    /**
     * @param string $keywords
     *
     * @return self
     */
    public function setKeywords($keywords = null)
    {
        $this->keywords = $keywords;
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
    public function getEan()
    {
        return $this->ean;
    }
    /**
     * @param string $ean
     *
     * @return self
     */
    public function setEan($ean = null)
    {
        $this->ean = $ean;
        return $this;
    }
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency($currency = null)
    {
        $this->currency = $currency;
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
     * @return AmazonData
     */
    public function getAmazonData()
    {
        return $this->amazonData;
    }
    /**
     * @param AmazonData $amazonData
     *
     * @return self
     */
    public function setAmazonData(AmazonData $amazonData = null)
    {
        $this->amazonData = $amazonData;
        return $this;
    }
    /**
     * @return Category
     */
    public function getMainCategory()
    {
        return $this->mainCategory;
    }
    /**
     * @param Category $mainCategory
     *
     * @return self
     */
    public function setMainCategory(Category $mainCategory = null)
    {
        $this->mainCategory = $mainCategory;
        return $this;
    }
    /**
     * @return Image
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }
    /**
     * @param Image $featuredImage
     *
     * @return self
     */
    public function setFeaturedImage(Image $featuredImage = null)
    {
        $this->featuredImage = $featuredImage;
        return $this;
    }
    /**
     * @return Image[]
     */
    public function getMedia()
    {
        return $this->media;
    }
    /**
     * @param Image[] $media
     *
     * @return self
     */
    public function setMedia(array $media = null)
    {
        $this->media = $media;
        return $this;
    }
    /**
     * @return Shipping[]
     */
    public function getShipping()
    {
        return $this->shipping;
    }
    /**
     * @param Shipping[] $shipping
     *
     * @return self
     */
    public function setShipping(array $shipping = null)
    {
        $this->shipping = $shipping;
        return $this;
    }
    /**
     * @return Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    /**
     * @param Attribute[] $attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes = null)
    {
        $this->attributes = $attributes;
        return $this;
    }
    /**
     * @return BookmarkMetadata
     */
    public function getBookmarkedBy()
    {
        return $this->bookmarkedBy;
    }
    /**
     * @param BookmarkMetadata $bookmarkedBy
     *
     * @return self
     */
    public function setBookmarkedBy(BookmarkMetadata $bookmarkedBy = null)
    {
        $this->bookmarkedBy = $bookmarkedBy;
        return $this;
    }
}