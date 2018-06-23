<?php

namespace Future\Log\Adapter;


interface AdapterInterface
{

    /**
     * @param int $level
     * @return AdapterInterface
     */
    public function setLogLevel($level);

    /**
     * @return int
     */
    public function getLogLevel();

    /**
     * @param \Future\Log\Formatter\FormatterInterface $formatter
     * @return AdapterInterface
     */
    public function setFormatter(\Future\Log\Formatter\FormatterInterface $formatter);

    /**
     * @return \Future\Log\Formatter\FormatterInterface
     */
    public function getFormatter();

}
