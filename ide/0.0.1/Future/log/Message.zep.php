<?php

namespace Future\Log;


class Message
{

    protected $message;


    protected $level;


    protected $time;


    protected $context;


    protected $extra;



    public function getMessage() {}


    public function getLevel() {}


    public function getTime() {}


    public function getContext() {}


    public function getExtra() {}

    /**
     * @param string $message
     * @param int $level
     * @param int $time
     * @param array $context
     * @param array $extra
     */
    public function __construct($message, $level, $time, array $context, array $extra = array()) {}

}
