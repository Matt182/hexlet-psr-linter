<?php

namespace HexletPsrLinter\checkers;

use PhpParser\Node;

class MethodChecker implements CheckerInterface
{
    private $nodeErrors = [];

    public function accept(Node $node)
    {
        return $node->getType() === 'Stmt_ClassMethod';
    }

    public function check(Node $node)
    {
        if (!\PHP_CodeSniffer::isCamelCaps($node->name)) {
            $this->nodeErrors = [$node->getLine(), $node->name];
        }
        return $this->nodeErrors;
    }
}
