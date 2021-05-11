<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit012f074c5746fe9174ddec4573ad8fa7
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit012f074c5746fe9174ddec4573ad8fa7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit012f074c5746fe9174ddec4573ad8fa7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit012f074c5746fe9174ddec4573ad8fa7::$classMap;

        }, null, ClassLoader::class);
    }
}
