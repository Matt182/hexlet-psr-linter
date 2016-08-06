<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class FunctionChecker implements CheckerInterface
{
    public function accept(Node $node)
    {
        return $node->getType() === 'Stmt_Function';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return [$node->getLine(), 'function', $node->name];
        }
        return [];
    }
}
