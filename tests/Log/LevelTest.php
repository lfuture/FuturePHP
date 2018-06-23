<?php
namespace Tests\Log;

use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\TestCase;

class LevelTest extends TestCase
{
    public function testLevelClassExist()
    {
        $this->assertTrue(class_exists("Future\\Log\\Level"));
    }
}