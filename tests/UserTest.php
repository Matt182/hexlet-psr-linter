<?php

namespace hexletPsrLinter;

use function hexletPsrLinter\checkFunctionName;

class CheckersTest extends \PHPUnit_Framework_TestCase
{
    public function testChectFuntionName()
    {
        $this->assertTrue(checkFunctionName());
    }
}
