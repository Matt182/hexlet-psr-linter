<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;
use PhpParser\NodeTraverser;

function run(string $path)
{
    if (exists($path)) {
        $code = read($path);
    } else {
        return 1;
    }

    $stmts = parse($code);
    $checkers = new NodeCheckers();
    $checkers->add(new FunctionChecker());
    $checkers->add(new MethodChecker());
    $traverser = new NodeTraverser();
    $visitor = new NodeVisitor($checkers->get());
    $traverser->addVisitor($visitor);
    $traverser->traverse($stmts);
    return $visitor->getResult();
}
