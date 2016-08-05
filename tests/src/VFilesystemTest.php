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

    public function testCreatesNewDirectoryAndProperties()
    {
        $filesystem = new VFilesystem();

        $dirname = 'test_folder';
        $mode    = 0777;
        $virtualDir = $filesystem->mkdir($dirname, $mode);

        $this->assertInstanceOf(\VFilesystem\Directory::class, $virtualDir);

        $this->assertEquals($virtualDir->getName(), $dirname);
        $this->assertEquals($virtualDir->getMode(), $mode);

        $now = new \DateTime();
        $this->assertEquals($virtualDir->getCreatedDate(), $now);
        $this->assertEquals($virtualDir->getUpdatedDate(), $now);
    }

}
