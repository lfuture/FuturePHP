<?php

namespace Future\Log\Formatter;


class LineFormatter extends \Future\Log\Formatter\AbstractFormatter
{

    protected $template = '[%date%] [%levelName%] %message%';


    protected $dateFormat = 'Y-m-d H:i:s';



    public function getTemplate() {}

    /**
     * @param mixed $template
     */
    public function setTemplate($template) {}

    /**
     * @param array $message
     * @return string|array
     */
    public function format(array $message) {}

}
