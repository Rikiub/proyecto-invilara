<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6549b2e9ea67b640936ad818fe9038e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6549b2e9ea67b640936ad818fe9038e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6549b2e9ea67b640936ad818fe9038e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc6549b2e9ea67b640936ad818fe9038e::$classMap;

        }, null, ClassLoader::class);
    }
}