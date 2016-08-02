<?php

namespace HexletPsrLinter;

function exists(string $path) : bool
{
    return file_exists($path) && pathinfo($path)['extension'] === 'php';
}

function read(string $path) : string
{
    return file_get_contents($path);
}
