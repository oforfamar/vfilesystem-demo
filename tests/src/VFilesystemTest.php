<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;
use VFilesystem\VFilesystem;
use VFilesystem\Storage\Memory as MemoryStorage;

class VFilesystemTest extends TestCase
{

    /**
     * @var VFilesystem
     */
    private $filesystem;

    protected function setUp()
    {
        $root = ['root' => '/'];
        $config = [
            'storage' => new MemoryStorage($root),
        ];
        VFilesystem::init($config);
        $this->filesystem = VFilesystem::getInstance();
    }

    public function testClassIsLoaded()
    {
        $this->assertTrue(class_exists('VFilesystem\\VFilesystem'), "Checking that \\VFilesystem class is loaded");
    }

    public function testCreatesNewDirectory()
    {
        $filesystem = $this->filesystem;

        $dirname = 'test_folder';
        $mode    = 0777;
        $virtualDir = $filesystem->mkdir($dirname, $mode);

        $this->assertInstanceOf(\VFilesystem\Directory::class, $virtualDir);
    }

    public function testDirectoryProperties()
    {
        $this->markTestSkipped('Must create the correct setup and teardown functions to test this.');
        $filesystem = $this->filesystem;

        $dirname = 'test_folder';
        $mode    = 0777;
        $virtualDir = $filesystem->mkdir($dirname, $mode);

        $this->assertEquals($virtualDir->getName(), $dirname);
        $this->assertEquals($virtualDir->getMode(), $mode);

        // @TODO: how to test if datetime is ok
        //$now = new \DateTime();
        //$this->assertEquals($virtualDir->getCreatedDate(), $now);
        //$this->assertEquals($virtualDir->getUpdatedDate(), $now);
    }

    public function testCreatesSubdirectory()
    {
        $filesystem = $this->filesystem;

        $child1Folder = 'child1';
        $mode         = 0777;
        $child1 = $filesystem->mkdir($child1Folder, $mode);
        echo __METHOD__ . ' -> ' . __LINE__.'<br>';
        echo '<pre>'.print_r($child1, 1).'</pre>'; exit;

        $child11Folder = 'child11';
        $mode          = 0777;
        $child11 = $child1->mkdir($child11Folder, $mode);

        $storage = $filesystem->getStorage();
        $content = $storage->read();
        echo __METHOD__ . ' -> ' . __LINE__.'<br>';
        echo '<pre>'.print_r($content, 1).'</pre>'; exit;
    }

    public function testCreatesEmptyFile()
    {
        $this->markTestSkipped('Must create the correct setup and teardown functions to test this.');
        $filesystem = $this->filesystem;

        $name = 'my_file';
        $file = $filesystem->createFile($name);
        $this->assertInstanceOf(\VFilesystem\File::class, $file);
    }
}
