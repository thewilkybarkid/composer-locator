<?php

## FILE GENERATED by mindplay/composer-locator @ $DATE
##
## This file will be auto-generated and overwritten at installation.

abstract class ComposerLocator
{
    /**
     * @var string[] map where Composer vendor/package name => absolute root path
     */
    private static $paths = $PATHS;

    /**
     * @param string $name Composer vendor/package name
     *
     * @return string absolute root path to package installation folder
     *
     * @throws RuntimeException if the specific package is not installed
     */
    public static function getPath($name)
    {
        $name = strtolower($name);

        if (! isset(self::$paths[$name])) {
            throw new RuntimeException("Composer package not found: {$name}");
        }

        return self::$paths[$name];
    }

    /**
     * @param string $name Composer vendor/package name
     *
     * @return bool true, if the given package is installed
     */
    public static function isInstalled($name)
    {
        return isset(self::$paths[$name]);
    }

    /**
     * @return string[] list of "vendor/package" names
     */
    public static function getPackages()
    {
        return array_keys(self::$paths);
    }

    /**
     * @return string[] map where Composer vendor/package name => absolute root path
     */
    public static function getPaths()
    {
        return self::$paths;
    }
}
