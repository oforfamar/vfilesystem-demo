<?php

namespace VFilesystem;

use VFilesystem\Storage\StorageInterface;

class VFilesystem extends Directory
{

    /**
     * @var VFilesystem
     */
    static private $instance;

    /**
     * @var StorageInterface
     */
    protected $storageDriver;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct('/', 0755, false);

        $this->validateConfig($config);

        $this->storageDriver = $config['storage'];
    }

    private function validateConfig(array $config)
    {
        if (!isset($config['storage'])) {
            throw new \InvalidArgumentException("Missing the storage object.");
        }

        if (!$config['storage'] instanceof StorageInterface) {
            throw new \InvalidArgumentException("The storage driver must implement the StorageInterface.");
        }
    }

    /**
     * @param array $config
     */
    public static function init(array $config)
    {
        if (static::getInstance()) {
            return;
        }

        $instance = new VFilesystem($config);
        static::$instance = $instance;
    }

    /**
     * @return VFilesystem
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * @return StorageInterface
     */
    public function getStorage()
    {
        return $this->storageDriver;
    }
}
