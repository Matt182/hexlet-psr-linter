<?php
namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

interface CheckerInterface
{
    function accept(Node $node);
    function check(Node $node);
}
