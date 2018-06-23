<?php

namespace Future\Log\Adapter;


abstract class AbstractAdapter implements \Future\Log\Adapter\AdapterInterface
{

    protected $level = Level::DEBUG;


    protected $formatter;


    protected $processors = array();


    /**
     * @param int $level
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function setLogLevel($level) {}

    /**
     * @return int
     */
    public function getLogLevel() {}

    /**
     * @param \Future\Log\Formatter\FormatterInterface $formatter
     * @return \Future\Log\Adapter\AdapterInterface
     */
    public function setFormatter(\Future\Log\Formatter\FormatterInterface $formatter) {}

    /**
     * @return \Future\Log\Formatter\FormatterInterface
     */
    public function getFormatter() {}

    /**
     * @param array $message
     */
    public function handle(array $message) {}

    /**
     * @param array $message
     */
    abstract public function isHandling(array $message);

    /**
     * @param array $message
     */
    abstract protected function write(array $message);

    /**
     * @param array $message
     * @return array
     */
    public function processMessage(array $message) {}

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

}
