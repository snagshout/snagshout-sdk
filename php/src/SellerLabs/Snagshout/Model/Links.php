<?php

namespace SellerLabs\Snagshout\Model;

class Links
{
    /**
     * @var string
     */
    protected $prev;
    /**
     * @var string
     */
    protected $next;
    /**
     * @var int
     */
    protected $page;
    /**
     * @var int
     */
    protected $last;
    /**
     * @var int
     */
    protected $limit;
    /**
     * @var int
     */
    protected $total;
    /**
     * @return string
     */
    public function getPrev()
    {
        return $this->prev;
    }
    /**
     * @param string $prev
     *
     * @return self
     */
    public function setPrev($prev = null)
    {
        $this->prev = $prev;
        return $this;
    }
    /**
     * @return string
     */
    public function getNext()
    {
        return $this->next;
    }
    /**
     * @param string $next
     *
     * @return self
     */
    public function setNext($next = null)
    {
        $this->next = $next;
        return $this;
    }
    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }
    /**
     * @param int $page
     *
     * @return self
     */
    public function setPage($page = null)
    {
        $this->page = $page;
        return $this;
    }
    /**
     * @return int
     */
    public function getLast()
    {
        return $this->last;
    }
    /**
     * @param int $last
     *
     * @return self
     */
    public function setLast($last = null)
    {
        $this->last = $last;
        return $this;
    }
    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }
    /**
     * @param int $limit
     *
     * @return self
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
        return $this;
    }
    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * @param int $total
     *
     * @return self
     */
    public function setTotal($total = null)
    {
        $this->total = $total;
        return $this;
    }
}