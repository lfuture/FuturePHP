<?php

namespace Future\Log;


class Log
{

    static protected $loggers = array();


    /**
     * @param string $module
     * @param string $channel
     */
    public static function getLogger($module = 'default', $channel = '') {}


    public static function channel() {}

    /**
     * @param string $name
     */
    public static function createLogger($name) {}

}
