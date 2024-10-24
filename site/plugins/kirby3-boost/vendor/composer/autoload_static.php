<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0363f9fe4394195bc812f227601ed0cb
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kirby\\' => 6,
        ),
        'B' => 
        array (
            'Bnomei\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kirby\\' => 
        array (
            0 => __DIR__ . '/..' . '/getkirby/composer-installer/src',
        ),
        'Bnomei\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Bnomei\\Bolt' => __DIR__ . '/../..' . '/classes/Bolt.php',
        'Bnomei\\BoostCache' => __DIR__ . '/../..' . '/classes/BoostCache.php',
        'Bnomei\\BoostFile' => __DIR__ . '/../..' . '/classes/BoostFile.php',
        'Bnomei\\BoostIndex' => __DIR__ . '/../..' . '/classes/BoostIndex.php',
        'Bnomei\\BoostPage' => __DIR__ . '/../..' . '/classes/BoostPage.php',
        'Bnomei\\BoostUser' => __DIR__ . '/../..' . '/classes/BoostUser.php',
        'Bnomei\\CacheBenchmark' => __DIR__ . '/../..' . '/classes/CacheBenchmark.php',
        'Bnomei\\ModelHasBoost' => __DIR__ . '/../..' . '/classes/ModelHasBoost.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Kirby\\ComposerInstaller\\CmsInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/CmsInstaller.php',
        'Kirby\\ComposerInstaller\\Installer' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Installer.php',
        'Kirby\\ComposerInstaller\\Plugin' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Plugin.php',
        'Kirby\\ComposerInstaller\\PluginInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/PluginInstaller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0363f9fe4394195bc812f227601ed0cb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0363f9fe4394195bc812f227601ed0cb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0363f9fe4394195bc812f227601ed0cb::$classMap;

        }, null, ClassLoader::class);
    }
}
