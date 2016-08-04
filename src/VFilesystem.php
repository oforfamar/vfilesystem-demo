<?php

namespace VFilesystem;

class VFilesystem
{

    public function mkdir($dirname, $mode = 0777, $recursive = false)
    {
        $dir = new Directory($dirname, $mode, $recursive);
        return $dir;
    }

}
