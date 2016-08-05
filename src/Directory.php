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
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
}
