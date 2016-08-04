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
        $virtualDir = $filesystem->mkdir($dirname);

        $this->assertInstanceOf(\VFilesystem\Directory::class, $virtualDir);
        $this->assertEquals($virtualDir->getName(), $dirname);
    }

}
