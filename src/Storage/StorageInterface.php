<?php

namespace VFilesystem\Storage;

use VFilesystem\FilesystemNode;

interface StorageInterface
{
    public function save(FilesystemNode $node);
    public function read();
}
