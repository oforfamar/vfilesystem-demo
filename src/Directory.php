<?php

namespace VFilesystem;

class Directory
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int|int
     */
    private $mode;

    /**
     * @var bool|bool
     */
    private $recursive;

    /**
     * @var Directory
     */
    private $parent;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var \DateTime
     */
    private $updatedDate;


    /**
     * @param string $name
     * @param int    $mode
     * @param bool   $recursive
     */
    public function __construct($name, int $mode, bool $recursive)
    {
        $this->name = $name;
        $this->mode = $mode;
        $this->recursive = $recursive;
        $this->createdDate = new \DateTime();
        $this->updatedDate = new \DateTime();
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMode() : int
    {
        return $this->mode;
    }

    /**
     * @return Directory
     */
    public function getParent() : Directory
    {
        return $this->parent;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate() : \DateTime
    {
        return $this->createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate() : \DateTime
    {
        return $this->updatedDate;
    }
}
