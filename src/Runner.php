<?php

namespace HexletPsrLinter;

function run(string $path)
{
    $files = getFiles($path);
    if (empty($files)) {
        throw new \Exception("No files there", 1);
    }

    $linter = new Linter();
    foreach ($files as $file) {
        $code = read($file);
        $linter->sniff($code);
    }
    return $linter->getResult();
}
