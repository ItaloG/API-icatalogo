<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73bca8611c66ed9387ed8d75ead0f3fd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73bca8611c66ed9387ed8d75ead0f3fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73bca8611c66ed9387ed8d75ead0f3fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit73bca8611c66ed9387ed8d75ead0f3fd::$classMap;

        }, null, ClassLoader::class);
    }
}
