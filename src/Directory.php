<?php

namespace VFilesystem;

class Directory
{

    private $name;
    private $mode;
    private $recursive;

    /**
     * @param string $name
     * @param int $mode
     * @param bool $recursive
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

}
