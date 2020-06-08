<?php
class Autoloader
{
    public function loadClass(string $classname)
    {
        $class = ltrim(strrchr($classname, "\\"), '\\');
        $path =  rtrim(str_replace($class, '', $classname), '\\');

        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$path}/{$class}.php";
        var_dump($filename);

        if(file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }
}