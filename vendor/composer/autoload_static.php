<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit78c04892ace747d42c885b4050840b7a
{
    public static $files = array (
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phalcon\\Ext\\Mailer\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phalcon\\Ext\\Mailer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit78c04892ace747d42c885b4050840b7a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit78c04892ace747d42c885b4050840b7a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}