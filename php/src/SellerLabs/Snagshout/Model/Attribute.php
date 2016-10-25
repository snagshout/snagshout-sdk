<?php

namespace SellerLabs\Snagshout\Model;

class Attribute
{
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $value;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $sort;
    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    /**
     * @param string $label
     *
     * @return self
     */
    public function setLabel($label = null)
    {
        $this->label = $label;
        return $this;
    }
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param string $value
     *
     * @return self
     */
    public function setValue($value = null)
    {
        $this->value = $value;
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
}