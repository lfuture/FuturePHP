<?php
/**
 *
 * @author ln6265431@163.com
 * @date: 2018/6/24上午1:32
 */
namespace Tests\Log\Adapter;

use PHPUnit\Framework\TestCase;
use Future\Log\Adapter\FileAdapter;

/**
 * Class FileAdapterTest
 */
class FileAdapterTest extends TestCase
{

    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testNotExistPath()
    {
        $adapter = new FileAdapter("/tmp/" . microtime(true) . "/" . microtime(true) . "/test.log");
        $adapter->write([
            "formatted" => "log test"
        ]);
    }

    public function testWriteLog()
    {
        $tmpLog = "/tmp/Future" . microtime(true) . ".log";
        $content = "log test";

        $adapter = new FileAdapter($tmpLog);
        $adapter->write([
            "formatted" => $content
        ]);

        $fileContent = file_get_contents($tmpLog);

        $this->assertEquals($content, $fileContent);
        unlink($tmpLog);
    }

}