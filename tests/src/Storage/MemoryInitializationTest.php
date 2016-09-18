<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;
use VFilesystem\Storage\Memory;

class MemoryInitializationTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing the root
     */
    public function testValidatorThrowExceptionWhenRootIsMissing()
    {
        new Memory([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing the root
     */
    public function testValidatorThrowExceptionWhenRootIsEmpty()
    {
        $config = [
            'root' => ''
        ];
        new Memory($config);
    }

    public function testInitialization()
    {
        $config = [
            'root' => '/'
        ];
        $memory = new Memory($config);

        $this->assertInstanceOf(\VFilesystem\Storage\Memory::class, $memory);
    }
}
