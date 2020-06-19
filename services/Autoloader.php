<?php

namespace app\services;

class Autoloader
{
    private $fileExrension = ".php";

    public function loadClass(string $classname)
    {
        $classname = str_replace('app\\', ROOT_DIR, $classname);
        $filename = realpath("{$classname}{$this->fileExrension}");
        if (file_exists($filename)) {
            require $filename;
            return true;
        }

        return false;
    }
}