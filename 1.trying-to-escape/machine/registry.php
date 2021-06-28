<?php

namespace Machine
{
    class Registry
    {
        protected static $data = array();
        protected static $numberOfWays = 0;

        public static function set($key, $value)
        {
            self::$data[$key] = $value;
        }

        public static function get($key)
        {
            return isset(self::$data[$key]) ? self::$data[$key] : null;
        }

        final public static function removeProduct($key)
        {
            if (array_key_exists($key, self::$data)) {
                unset(self::$data[$key]);
            }
        }

        public static function increaseNumberOfWays()
        {
            self::$numberOfWays++;
        }

        public static function getNumberOfWays()
        {
            return self::$numberOfWays;
        }

    }

}
