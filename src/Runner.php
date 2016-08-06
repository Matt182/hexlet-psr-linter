<?php

namespace HexletPsrLinter;

function run(string $path)
{
    $files = getFiles($path);
    if (empty($files)) {
        throw new \Exception("No files there", 1);
    }

    $result = [];
    foreach ($files as $file) {
        $code = read($file);
        $result = array_merge($result, lint($code));
    }
    return $result;
}
