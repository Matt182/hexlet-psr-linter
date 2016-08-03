<?php

namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;

function run(string $path)
{
    if (exists($path)) {
        $code = read($path);
    }

    $stmts = parse($code);
    $checkers = new NodeCheckers();
    $checkers->add(new FunctionChecker());
    $checkers->add(new MethodChecker());
    var_dump(messageOut(checkTree($stmts, $checkers->get())));
}
