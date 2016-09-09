<?php

namespace VFilesystem\Storage;

use VFilesystem\FilesystemNode;

class Memory implements StorageInterface
{
    /**
     * @var array
     */
    private $content = [];

    public function save(FilesystemNode $node)
    {
        $parent = $node->getParent();
        var_dump($parent); exit;

        if (null === $parent) {
            $this->content[] = $node;
            return;
        }

        $parentKeys = $this->getParentKeys($node);
        echo __METHOD__ . ' : ' . __LINE__;
        echo '<pre>'.print_r($parentKeys, 1).'</pre>'; exit;
    }

    /**
     * @param FilesystemNode $node
     *
     * @return array
     */
    private function getParentKeys(FilesystemNode $node)
    {
        $keys = [];
        while($parent = $node->getParent()) {
            $keys[] = $parent->getName();
            $node = $node->getParent();
        }

        return $keys;
    }

    public function read($name)
    {
    }
}
