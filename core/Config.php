<?php

namespace Core;

class Config {

    private static $settings = array();

    public static function get($key) {
        if (!isset(self::$settings[$key])) {
            return null;
        }
        return self::$settings[$key];
    }

    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }

}