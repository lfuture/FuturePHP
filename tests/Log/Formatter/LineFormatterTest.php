<?php
/**
 *
 * @author ln6265431@163.com
 * @date: 2018/6/24上午1:55
 */
namespace Tests\Log\Formatter;

use Future\Log\Formatter\LineFormatter;
use Future\Log\Level;
use PHPUnit\Framework\TestCase;

/**
 * Class LIneFormatterTest
 */
class LineFormatterTest extends TestCase
{
    public function testContextFormat()
    {
        $date = "2018-01-20 09:40:00";

        $time = strtotime($date);

        $message = [
            "time" => $time,
            "levelName" => Level::getLevelName(Level::DEBUG),
            "message" => "test {framework} log with context",
            "context" => [
                "framework" => "FuturePHP"
            ]
        ];
        $lineFormatter = new LineFormatter();
        $message = $lineFormatter->format($message);
        $this->assertEquals("[2018-01-20 09:40:00] [DEBUG] test FuturePHP log with context\n", $message);
    }

    /**
     * @dataProvider messageProvider
     * @param $date
     * @param $message
     * @param $formatted
     */
    public function testSetTemplate($date, $message)
    {
        $lineFormatter = new LineFormatter();
        $lineFormatter->setTemplate("[%date%] %message%");
        $message = $lineFormatter->format($message);
        $this->assertEquals("[2018-01-20 09:40:00] test FuturePHP log with context\n", $message);
    }

    public function messageProvider()
    {
        $date = "2018-01-20 09:40:00";
        $time = strtotime($date);
        return [[
            "date" => "2018-01-20 09:40:00",
            "message" => [
                "time" => $time,
                "levelName" => Level::getLevelName(Level::DEBUG),
                "message" => "test {framework} log with context",
                "context" => [
                    "framework" => "FuturePHP"
                ]
            ],
            "formatted" => "[2018-01-20 09:40:00] [DEBUG] test FuturePHP log with context\n"
        ]];
    }
}