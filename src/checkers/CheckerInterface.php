<?php
namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

interface CheckerInterface
{
    public function accept(Node $node);
    public function check(Node $node);
}
