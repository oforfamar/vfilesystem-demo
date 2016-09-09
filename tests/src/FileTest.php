<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testClassIsLoaded()
    {
        $this->assertTrue(class_exists('VFilesystem\\File'), "Checking that File class is loaded");
    }
}
