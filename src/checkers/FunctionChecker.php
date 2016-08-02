<?php

namespace HexletPsrLinter\Checkers;

use PhpParser\Node;

class FunctionChecker implements CheckerInterface
{
    private $nodeErrors;

    function accept(Node $node)
    {
        return $node->getType() === 'Stmt_Function';
    }

    function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            $this->nodeErrors = [$node->getLine(), $node->name];
        }
        return $this->nodeErrors;
    }
}
