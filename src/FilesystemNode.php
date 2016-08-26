<?php

namespace VFilesystem;

abstract class FilesystemNode
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int|int
     */
    protected $mode;

    /**
     * @var Directory
     */
    protected $parent;

    /**
     * @var \DateTime
     */
    protected $createdDate;

    /**
     * @var \DateTime
     */
    protected $updatedDate;

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
