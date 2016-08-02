<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\CheckerInterface;

class NodeCheckers
{
    private $checkers;

    public function get()
    {
        return $this->checkers;
    }

    public function add(CheckerInterface $checker)
    {
        $this->checkers[] = $checker;
    }
}
