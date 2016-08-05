<?php

namespace VFilesystem;

class Directory
{

    private $name;
    private $mode;
    private $recursive;

    private $parent;
    private $permissions;
    private $createdDate;
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
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
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
    public function getPermissions()
    {
        return $this->permissions;
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
