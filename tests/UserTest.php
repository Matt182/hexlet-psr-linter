<?php

namespace hexletPsrLinter;

use function hexletPsrLinter\checkFunctionName;

class CheckersTest extends \PHPUnit_Framework_TestCase
{
    public function testChectFuntionName()
    {
        $testArr = [
            'camelCase' => true,
            'CamelCase' => false,
            'camelcase' => true,
            'Camelcase' => false,
            'camelCamelCamel' => true,
            'camel_case' => false
        ];

        foreach ($testArr as $key => $val) {
            $this->assertEquals(checkFunctionName($key), $val);
        }
    }
}
