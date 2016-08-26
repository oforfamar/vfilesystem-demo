<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;
use VFilesystem\VFilesystem;

class VFilesystemTest extends TestCase
{

    public function testClassIsLoaded()
    {
        $this->assertTrue(class_exists('VFilesystem\\VFilesystem'), "Checking that class is loaded");
    }

    public function testCreatesNewDirectory()
    {
        $filesystem = new VFilesystem();

        $dirname = 'test_folder';
        $mode    = 0777;
        $virtualDir = $filesystem->mkdir($dirname, $mode);

        $this->assertInstanceOf(\VFilesystem\Directory::class, $virtualDir);
    }

    public function testDirectoryProperties()
    {
        $filesystem = new VFilesystem();

        $dirname = 'test_folder';
        $mode    = 0777;
        $virtualDir = $filesystem->mkdir($dirname, $mode);

        $this->assertEquals($virtualDir->getName(), $dirname);
        $this->assertEquals($virtualDir->getMode(), $mode);

        $now = new \DateTime();
        $this->assertEquals($virtualDir->getCreatedDate(), $now);
        $this->assertEquals($virtualDir->getUpdatedDate(), $now);
    }

    public function testCreatesSubdirectory()
    {
        $filesystem = new VFilesystem();

        $dirname = 'parent_folder';
        $mode    = 0777;
        $filesystem->mkdir($dirname, $mode);

        $subdirs = $filesystem->ls();
        $this->assertInternalType('array', $subdirs);
        $this->assertEquals('parent_folder', $subdirs[0]->getName());
    }

    public function testCreatesEmptyFile()
    {
        $filesystem = new VFilesystem();

        $name = 'my_file';
        $file = $filesystem->createFile($name);
        $this->assertInstanceOf(\VFilesystem\File::class, $file);
    }
}
