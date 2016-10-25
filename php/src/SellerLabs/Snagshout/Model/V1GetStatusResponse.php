<?php

namespace SellerLabs\Snagshout\Model;

class V1GetStatusResponse
{
    /**
     * @var string[]
     */
    protected $errors;
    /**
     * @var bool
     */
    protected $error;
    /**
     * @var int
     */
    protected $code;
    /**
     * @var int
     */
    protected $status;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var bool
     */
    protected $success;
    /**
     * @var V1GetStatus
     */
    protected $data;
    /**
     * @var Links
     */
    protected $links;
    /**
     * @return string[]
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * @param string[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
        return $this;
    }
    /**
     * @return bool
     */
    public function getError()
    {
        return $this->error;
    }
    /**
     * @param bool $error
     *
     * @return self
     */
    public function setError($error = null)
    {
        $this->error = $error;
        return $this;
    }
    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @param int $code
     *
     * @return self
     */
    public function setCode($code = null)
    {
        $this->code = $code;
        return $this;
    }
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param int $status
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
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * @param string $message
     *
     * @return self
     */
    public function setMessage($message = null)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }
    /**
     * @param bool $success
     *
     * @return self
     */
    public function setSuccess($success = null)
    {
        $this->success = $success;
        return $this;
    }
    /**
     * @return V1GetStatus
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param V1GetStatus $data
     *
     * @return self
     */
    public function setData(V1GetStatus $data = null)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * @return Links
     */
    public function getLinks()
    {
        return $this->links;
    }
    /**
     * @param Links $links
     *
     * @return self
     */
    public function setLinks(Links $links = null)
    {
        $this->links = $links;
        return $this;
    }
}