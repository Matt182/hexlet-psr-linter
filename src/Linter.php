<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;
use PhpParser\NodeTraverser;

function lint(string $code)
{
    $checkers = new NodeCheckers();
    $traverser = new NodeTraverser();
    $visitor = new NodeVisitor($checkers->get());
    $traverser->addVisitor($visitor);
    $traverser->traverse(parse($code));
    return $visitor->getResult();
}
