<?php

namespace Future\Log;


interface LoggerInterface
{

    /**
     * @param int $level
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function log($level, $message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function debug($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function error($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function info($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function notice($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function warning($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function alert($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function critical($message, array $context = array());

    /**
     * @param mixed $message
     * @param array $context
     * @return AdapterInterface
     */
    public function emergency($message, array $context = array());

}
