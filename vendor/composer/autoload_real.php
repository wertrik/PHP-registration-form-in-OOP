<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit665b23f06902cd776ce43d2e959df39e
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

        spl_autoload_register(array('ComposerAutoloaderInit665b23f06902cd776ce43d2e959df39e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit665b23f06902cd776ce43d2e959df39e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit665b23f06902cd776ce43d2e959df39e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
