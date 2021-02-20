<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe2560dca388a209fbbd5882046259a6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe2560dca388a209fbbd5882046259a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe2560dca388a209fbbd5882046259a6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}