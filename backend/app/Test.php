<?php 

namespace App;

class Test 
{
    public static function hello()
    {
        echo APP_PATH;
        var_dump('hello!');
        phpinfo();
    }
}