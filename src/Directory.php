<?php

namespace VFilesystem;

class Directory extends FilesystemNode
{

    /**
     * @var array
     */
    private $children;

    /**
     * @var bool|bool
     */
    private $recursive;

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
     * @param string $dirname
     * @param int    $mode Octal
     * @param bool   $recursive
     *
     * @returns Directory
     */
    public function mkdir($dirname, $mode = 0777, $recursive = false) : Directory
    {
        $dir = new Directory($dirname, $mode, $recursive);
        $dir->setParent($this);

        $this->storageDriver->save($dir);

        $this->addChild($dir);

        return $dir;
    }

    /**
     * @param Directory|File $child
     */
    private function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @return array
     */
    public function ls() : array
    {
        return $this->children;
    }

    /**
     * @param string $name
     *
     * @return File
     */
    public function createFile($name)
    {
        $file = new File($name);
        // @todo: persist file

        $this->addChild($file);

        return $file;
    }
}
