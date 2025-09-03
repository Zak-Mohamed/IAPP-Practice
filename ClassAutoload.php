<?php
$directory = array("Forms", "forms");

spl_autoload_register(function ($class_name) use ($directory) {
    foreach ($directory as $dir) {
        if (file_exists($dir . '/' . $class_name . '.php')) {
            require $dir . '/' . $class_name . '.php';
        }
    }
});
