<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita8ab112e3325ba0dd7068156bd9a7c69
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jonathan\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jonathan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita8ab112e3325ba0dd7068156bd9a7c69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita8ab112e3325ba0dd7068156bd9a7c69::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
