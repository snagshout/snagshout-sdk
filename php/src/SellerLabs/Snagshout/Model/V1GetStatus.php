<?php

namespace SellerLabs\Snagshout\Model;

class V1GetStatus
{
    /**
     * @var float
     */
    protected $connTime;
    /**
     * @var string
     */
    protected $version;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $timestamp;
    /**
     * @return float
     */
    public function getConnTime()
    {
        return $this->connTime;
    }
    /**
     * @param float $connTime
     *
     * @return self
     */
    public function setConnTime($connTime = null)
    {
        $this->connTime = $connTime;
        return $this;
    }
    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
    /**
     * @param string $version
     *
     * @return self
     */
    public function setVersion($version = null)
    {
        $this->version = $version;
        return $this;
    }
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
        return $this;
    }
    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    /**
     * @param string $timestamp
     *
     * @return self
     */
    public function setTimestamp($timestamp = null)
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}