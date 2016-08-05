<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Linter;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testRunner()
    {
        $path = __DIR__.'/fixtures';
        $result = run($path);
        $this->assertEquals(
            [[2,'function','re_qwe'],[14,'method','Wrong'],[2, 'function', 'InnerWrong']],
            $result
        );
    }
}
