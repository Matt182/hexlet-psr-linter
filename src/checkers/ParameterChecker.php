<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class ParameterChecker implements CheckerInterface
{
    public function accept(Node $node)
    {
        return $node->getType() === 'Param';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            return [$node->getLine(), 'parameter', $node->name];
        }
        return [];
    }
}
