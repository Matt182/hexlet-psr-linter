<?php

namespace HexletPsrLinter;

function run(string $path)
{
    if (file_exists($path) && pathinfo($path)['extension'] === 'php') {
        $code = file_get_contents($path);
        return lint($code);
    }
    throw new \Exception("File $path is not exists", 1);
}
