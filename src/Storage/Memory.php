<?php

namespace VFilesystem\Storage;

use VFilesystem\FilesystemNode;

class Memory implements StorageInterface
{
    /**
     * @var string
     */
    private $root;

    /**
     * @var array
     */
    private $content = [];

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->validateConfig($config);

        if (isset($this->content[$config['root']])) {
            return;
        }

        $this->root = $config['root'];
        $this->content[$this->root] = [];
    }

    /**
     * @param array $config
     */
    private function validateConfig(array $config)
    {
        if (!isset($config['root']) || $config['root'] == '') {
            throw new \InvalidArgumentException("Missing the root folder.");
        }
    }

    public function save(FilesystemNode $node)
    {
        $parent = $node->getParent();

        if (null === $parent) {
            //$this->content[] = $node;
            return;
        }

        $parentKeys = $this->getParentKeys($node);

        $this->addNode($this->content, $parentKeys, $node);
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

        $keys[] = $node->getName();

        return array_reverse($keys);
    }

    /**
     * @param array          $parentFolder
     * @param array          $keys
     * @param FilesystemNode $node
     */
    private function addNode(array &$parentFolder, array $keys, FilesystemNode $node)
    {
        if (count($keys) == 1) {
            $parentFolder[$node->getName()] = $node;
            return;
        }

        $tempKeys  = array_reverse($keys);
        $parentKey = array_pop($tempKeys);
        $keys      = array_reverse($tempKeys);

        $this->addNode($parentFolder[$parentKey], $keys, $node);
    }

    /**
     * @return array
     */
    public function read()
    {
        return $this->content;
    }
}
