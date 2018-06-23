<?php

namespace Future\Log;


class Logger
{

    protected $loggerName;


    protected $adapters = array();


    static protected $timezone;


    protected $name;


    protected $processors = array();


    protected $transaction = false;


    protected $queue = array();



    public function getLoggerName() {}


    public function getName() {}

    /**
     * @param mixed $name
     */
    public function setName($name) {}

    /**
     * @param string $name
     * @param array $handlers
     * @param array $processors
     */
    public function __construct($name, array $handlers = array(), array $processors = array()) {}

    /**
     * @param \Future\Log\Adapter\AdapterInterface $adapter
     * @return Logger
     */
    public function pushAdapter(\Future\Log\Adapter\AdapterInterface $adapter) {}

    /**
     * @return null|\Future\Log\Adapter\AdapterInterface
     */
    public function popAdapter() {}

    /**
     * @param array $adapters
     * @return Logger
     */
    public function setAdapters(array $adapters) {}

    /**
     * @return array
     */
    public function geAdapters() {}

    /**
     * @param object $processor
     * @return Logger
     */
    public function pushProcessor($processor) {}

    /**
     * @return ProcessorInterface
     */
    public function popProcessor() {}

    /**
     * @param array $processors
     * @return Logger
     */
    public function setProcessor(array $processors) {}


    public function getProcessor() {}

    /**
     * @param int $level
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function log($level, $message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function debug($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function error($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function info($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function notice($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function warning($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function alert($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function critical($message, array $context = array()) {}

    /**
     * @param mixed $message
     * @param array $context
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function emergency($message, array $context = array()) {}

    /**
     * @param int $level
     * @param mixed $messageString
     * @param int $time
     * @param array $context
     * @param array $extra
     */
    protected function write($level, $messageString, $time, array $context, array $extra = array()) {}

    /**
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function begin() {}

    /**
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function commit() {}

    /**
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function rollback() {}

    /**
     * @return bool
     */
    public function isTransaction() {}

    /**
     * @param string $name
     * @return Logger
     */
    public function withName($name) {}

}
