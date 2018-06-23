<?php
/**
 *
 * @author ln6265431@163.com
 * @date: 2018/6/24上午2:21
 * @package Tests\Log
 */

namespace Tests\Log;

use Future\Log\Adapter\FileAdapter;
use Future\Log\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Class LoggerTest
 * @package Tests\Log
 */
class LoggerTest extends TestCase
{

    public function testSingleAdapter()
    {
        $filePath = "/tmp/" . microtime(true) . ".log";
        $logger = new Logger("test");
        $adapter = new FileAdapter($filePath);
        $logger->pushAdapter($adapter);
        $logger->info("Test {type} adapter FileAdapter", [
            "type" => "single"
        ]);
        $fileContent = file_get_contents($filePath);
        $logReg = "/\] \[DEBUG\] Test single adapter FileAdapter\n$/";
        $this->assertEquals(1, preg_match($logReg, $fileContent));
        unlink($filePath);
    }
}