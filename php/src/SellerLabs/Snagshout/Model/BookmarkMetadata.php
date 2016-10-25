<?php

namespace SellerLabs\Snagshout\Model;

class BookmarkMetadata
{
    /**
     * @var int
     */
    protected $count;
    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
    /**
     * @param int $count
     *
     * @return self
     */
    public function setCount($count = null)
    {
        $this->count = $count;
        return $this;
    }
}