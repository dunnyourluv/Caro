<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7e8b235c45ec3c65da7eb368979805ba
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

        spl_autoload_register(array('ComposerAutoloaderInit7e8b235c45ec3c65da7eb368979805ba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7e8b235c45ec3c65da7eb368979805ba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7e8b235c45ec3c65da7eb368979805ba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}