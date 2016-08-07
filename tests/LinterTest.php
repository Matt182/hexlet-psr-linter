<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Linter;
use org\bovigo\vfs\vfsStream;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->root = vfsStream::setup('root');
        $structure = array(
                'innerFixture' => array(
                    'innerTest.php' => '<?php
                    function InnerWrong() {}
                    $not_camel;    ?>'),
                'test.php' => '<?php
                    function re_qwe() {}
                    function ok() {}
                    class Test {

                        function Wrong() {}
                        function ok() {}
                        private $camel;
                    }?>',
            );
            vfsStream::create($structure, $this->root);
    }

    public function testRunner()
    {
        $rootPath = vfsStream::url($this->root->getName());


        $path = __DIR__.'/fixtures';
        $result = run($rootPath);
        $this->assertEquals(
            [[2, 'function', 'InnerWrong'], [3, 'variable', 'not_camel'],
            [2,'function','re_qwe'], [6,'method','Wrong']],
            $result
        );
    }
}
