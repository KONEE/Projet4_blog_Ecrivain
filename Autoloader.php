<?php
class Autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    static function autoload($className) {
        $path = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
        //var_dump($path);
        if (file_exists($path)) {
            require $path;
        }
    }
}
