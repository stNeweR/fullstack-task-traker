<?php 

namespace Kernel\Helpers;

class Str 
{
    public static function clean(string $str): string
    {
        return preg_replace('/(^\/)|(\/$)/', '', $str);
    }
}