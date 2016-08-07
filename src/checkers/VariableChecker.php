<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class VariableChecker implements CheckerInterface
{
    public function accept(Node $node)
    {
        return $node->getType() === 'Expr_Variable';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return [$node->getLine(), 'variable', $node->name];
        }
        return [];
    }
}
