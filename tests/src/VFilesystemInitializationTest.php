<?php

namespace VFilesystem\Tests;

use PHPUnit\Framework\TestCase;
use VFilesystem\VFilesystem;
use VFilesystem\Storage\Memory as MemoryStorage;

class VFilesystemInitializationTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing the storage
     */
    public function testValidatorThrowsExceptionWhenStorageDriverIsMissing()
    {
        VFilesystem::init([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The storage driver must implement
     */
    public function testValidatorThrowsExceptionWhenStorageDriverDoesntImplementStorageInterface()
    {
        VFilesystem::init([
            'storage' => new \stdClass
        ]);
    }

    public function testInitialization()
    {
        $memoryStorage = new MemoryStorage(['root' => '/']);
        $config = [
            'storage' => $memoryStorage,
        ];
        VFilesystem::init($config);

        $instance = VFilesystem::getInstance();
        $this->assertEquals($memoryStorage, $instance->getStorage());
    }
}
