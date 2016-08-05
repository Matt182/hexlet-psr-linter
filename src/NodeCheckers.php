<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\CheckerInterface;
use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;

class NodeCheckers
{
    private $checkers;

    public function __construct()
    {
        $this->checkers = [
            new FunctionChecker(),
            new MethodChecker()
        ];
    }

    public function get()
    {
        return $this->checkers;
    }

    public function add(CheckerInterface $checker)
    {
        $this->checkers[] = $checker;
    }
}
