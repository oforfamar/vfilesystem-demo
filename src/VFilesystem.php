<?php

namespace VFilesystem;

class VFilesystem extends Directory
{

    public function __construct()
    {
        parent::__construct('/', 0755, false);
    }

}
