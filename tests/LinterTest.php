<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Linter;
use org\bovigo\vfs\vfsStream;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->root = vfsStream::setup('root');
        $structure = [
                'innerFixture' => [
                    'innerTest.php' => '<?php
                    function InnerWrong() {}
                    $not_camel;    ?>'],
                'test.php' => '<?php
                    function re_qwe() {}
                    function ok() {}
                    class Test {
                        function Wrong() {}
                        function ok($wrong_par) {}
                        private $camel;
                        private $WrongVar;
                    }?>',
                'emptyDir' => []
            ];
            vfsStream::create($structure, $this->root);
    }

    public function testRunner()
    {
        $rootPath = vfsStream::url($this->root->getName());

        $result = run($rootPath);
        $this->assertEquals(
            [[2, 'function', 'InnerWrong'], [3, 'variable', 'not_camel'],
            [2,'function','re_qwe'], [5,'method','Wrong'],
            [6, 'parameter', 'wrong_par'], [8, 'property', 'WrongVar']],
            $result
        );
    }

    public function testNoFilesExeption()
    {
        $path = vfsStream::url("root/emptyDir");

        $this->expectException('\Exception');
        $this->expectExceptionMessage("No files there");
        run($path);
    }

    public function testParseError()
    {
        $this->expectException('\Exception');
        $this->expectExceptionMessage("Syntax error, unexpected T_VARIABLE on line 1");
        lint('<?php $no $noo ?>');
    }
}
