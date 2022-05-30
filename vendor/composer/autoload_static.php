<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0dfdc0c4b5f4d3640a241d1c766061e4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0dfdc0c4b5f4d3640a241d1c766061e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0dfdc0c4b5f4d3640a241d1c766061e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0dfdc0c4b5f4d3640a241d1c766061e4::$classMap;

        }, null, ClassLoader::class);
    }
}