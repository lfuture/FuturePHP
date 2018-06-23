<?php

namespace Future\Log\Adapter;


class FileAdapter extends \Future\Log\Adapter\AbstractAdapter
{

    protected $filePath;


    /**
     * @param string $filePath
     */
    public function __construct($filePath) {}

    /**
     * @param array $message
     */
    public function write(array $message) {}

    /**
     * @param array $message
     * @return bool
     */
    public function isHandling(array $message) {}

    /**
     * @return FormatterInterface
     */
    public function getFormatter() {}

}
