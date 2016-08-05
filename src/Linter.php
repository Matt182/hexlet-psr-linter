<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;
use PhpParser\NodeTraverser;

class Linter
{

    public function __construct()
    {
        $checkers = new NodeCheckers();
        $this->visitor = new NodeVisitor($checkers->get());
        $this->traverser = new NodeTraverser();
        $this->traverser->addVisitor($this->visitor);
    }

    public function sniff($code)
    {
        $this->traverser->traverse(parse($code));
    }

    public function getResult()
    {
        return $this->visitor->getResult();
    }
}
