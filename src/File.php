<?php

namespace VFilesystem;

class File extends FilesystemNode
{
    /**
     * @var string
     */
    private $content;

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

    /**
     * @param string $content
     */
    public function write($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function read()
    {
        // @todo: use a generator system to yield the contents of the file from the actual storage
        return $this->content;
    }
}
