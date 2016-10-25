<?php

namespace SellerLabs\Snagshout\Model;

class Image
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $sort;
    /**
     * @var bool
     */
    protected $featured;
    /**
     * @var ImageMetadata
     */
    protected $metadata;
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
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title = null)
    {
        $this->title = $title;
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
    public function getSort()
    {
        return $this->sort;
    }
    /**
     * @param int $sort
     *
     * @return self
     */
    public function setSort($sort = null)
    {
        $this->sort = $sort;
        return $this;
    }
    /**
     * @return bool
     */
    public function getFeatured()
    {
        return $this->featured;
    }
    /**
     * @param bool $featured
     *
     * @return self
     */
    public function setFeatured($featured = null)
    {
        $this->featured = $featured;
        return $this;
    }
    /**
     * @return ImageMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
    /**
     * @param ImageMetadata $metadata
     *
     * @return self
     */
    public function setMetadata(ImageMetadata $metadata = null)
    {
        $this->metadata = $metadata;
        return $this;
    }
}