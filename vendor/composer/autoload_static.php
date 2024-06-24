<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc3754386f85eba18fcf08fe42ba94b4b
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'ExpanceTraker\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ExpanceTraker\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc3754386f85eba18fcf08fe42ba94b4b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc3754386f85eba18fcf08fe42ba94b4b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc3754386f85eba18fcf08fe42ba94b4b::$classMap;

        }, null, ClassLoader::class);
    }
}
