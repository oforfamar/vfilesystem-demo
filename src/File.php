<?php

namespace VFilesystem;

class File extends FilesystemNode
{
    /**
     * @param string $name
     * @param int    $mode
     */
    public function __construct($name, int $mode = 0644)
    {
        $this->name = $name;
        $this->mode = $mode;
        $this->createdDate = new \DateTime();
        $this->updatedDate = new \DateTime();
    }
}
