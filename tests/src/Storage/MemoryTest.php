<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;
use VFilesystem\VFilesystem;
use VFilesystem\Storage\Memory as MemoryStorage;

class MemoryTest extends TestCase
{
    /**
     * @var VFilesystem
     */
    protected $filesystem;

    protected function setUp()
    {
        $memoryConfig = [
            'root' => '/'
        ];
        $memoryStorage = new MemoryStorage($memoryConfig);

        $config = [
            'storage' => $memoryStorage
        ];
        $this->filesystem = new VFilesystem($config);
    }

    public function testClassIsLoaded()
    {
        $this->assertTrue(class_exists('VFilesystem\\Storage\\Memory'), "Checking that \\Memory class is loaded");
    }

    public function testChildFolderIsPersisted()
    {
        $filesystem = $this->filesystem;

        $childFolder = 'child1';
        $mode = 0777;
        $filesystem->mkdir($childFolder, $mode);


    }
}
