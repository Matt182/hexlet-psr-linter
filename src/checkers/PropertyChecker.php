<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class PropertyChecker implements CheckerInterface
{
    public function accept(Node $node)
    {
        return $node->getType() === 'Stmt_PropertyProperty';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return [$node->getLine(), 'property', $node->name];
        }
        return [];
    }
}
