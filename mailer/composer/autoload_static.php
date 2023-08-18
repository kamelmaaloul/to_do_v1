<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb042ab9944b8b838a6bfb2089227602a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb042ab9944b8b838a6bfb2089227602a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb042ab9944b8b838a6bfb2089227602a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb042ab9944b8b838a6bfb2089227602a::$classMap;

        }, null, ClassLoader::class);
    }
}