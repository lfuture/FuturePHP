<?php

namespace Future\Log\Formatter;


interface FormatterInterface
{

    /**
     * @param array $message
     * @return string|array
     */
    public function format(array $message);

    /**
     * @param string $message
     * @param mixed $context
     * @return string
     */
    public function interpolate($message, $context = null);

}
