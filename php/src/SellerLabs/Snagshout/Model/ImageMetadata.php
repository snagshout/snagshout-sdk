<?php

namespace SellerLabs\Snagshout\Model;

class ImageMetadata
{
    /**
     * @var string
     */
    protected $originalSrc;
    /**
     * @var string
     */
    protected $small;
    /**
     * @var string
     */
    protected $medium;
    /**
     * @return string
     */
    public function getOriginalSrc()
    {
        return $this->originalSrc;
    }
    /**
     * @param string $originalSrc
     *
     * @return self
     */
    public function setOriginalSrc($originalSrc = null)
    {
        $this->originalSrc = $originalSrc;
        return $this;
    }
    /**
     * @return string
     */
    public function getSmall()
    {
        return $this->small;
    }
    /**
     * @param string $small
     *
     * @return self
     */
    public function setSmall($small = null)
    {
        $this->small = $small;
        return $this;
    }
    /**
     * @return string
     */
    public function getMedium()
    {
        return $this->medium;
    }
    /**
     * @param string $medium
     *
     * @return self
     */
    public function setMedium($medium = null)
    {
        $this->medium = $medium;
        return $this;
    }
}