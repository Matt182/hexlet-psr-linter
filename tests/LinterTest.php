<?php

namespace HexletPsrLinter;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function testRun()
    {
        $path = __DIR__.'/fixtures/test.php';
        $result = run($path);
        $this->assertEquals([[2,'function','re_qwe'],[14,'method','Wrong']], $result);
    }
}
