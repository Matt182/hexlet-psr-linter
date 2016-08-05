<?php

namespace HexletPsrLinter;

function run(string $path)
{
    if (exists($path)) {
        $code = read($path);
        return lint($code);
    }
    throw new Exception("File $path is not exists", 1);
}
