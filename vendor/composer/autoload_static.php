<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7dcf4c5a08df6d8b143242439e45409c
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Defuse\\Crypto\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Defuse\\Crypto\\' => 
        array (
            0 => __DIR__ . '/..' . '/defuse/php-encryption/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7dcf4c5a08df6d8b143242439e45409c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7dcf4c5a08df6d8b143242439e45409c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
