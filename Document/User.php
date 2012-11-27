<?php

namespace polygram\PHPCRBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @PHPCRODM\Document(referenceable=true)
 */
class User
{
    /**
	 * to create the document at the specified location. read only for existing documents.
     *
     * @PHPCRODM\Id
     */
    protected $path;

    /**
	 * @PHPCRODM\String()
	 */
    public $username;

    /**
	 * @PHPCRODM\String()
     */
    public $password;

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->username;
    }
}