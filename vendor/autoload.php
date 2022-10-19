<?php
function myAutoloader($className)
{
    $path = str_replace("\\", "/", $className) . '.classes.php';
    if (file_exists($path)) {
        include_once $path;
    }else {
        include_once '../' . $path;
    }
}
spl_autoload_register('myAutoloader');
