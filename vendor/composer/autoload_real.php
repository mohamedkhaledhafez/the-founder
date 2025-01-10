<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit43a2b7ad649b7e63ca90d8d3ac62ea58
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit43a2b7ad649b7e63ca90d8d3ac62ea58', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit43a2b7ad649b7e63ca90d8d3ac62ea58', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit43a2b7ad649b7e63ca90d8d3ac62ea58::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}