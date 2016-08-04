<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class MethodChecker implements CheckerInterface
{
    public function accept(Node $node)
    {
        return $node->getType() === 'Stmt_ClassMethod';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return [$node->getLine(), 'method', $node->name];
        }
        return [];
    }
}
