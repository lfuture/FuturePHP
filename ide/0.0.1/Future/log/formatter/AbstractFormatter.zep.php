<?php

namespace Future\Log\Formatter;


abstract class AbstractFormatter implements \Future\Log\Formatter\FormatterInterface
{

    /**
     * @param string $message
     * @param mixed $context
     * @return string
     */
    public function interpolate($message, $context = null) {}

}
