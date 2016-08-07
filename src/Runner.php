<?php

namespace HexletPsrLinter;

function run(string $path)
{
    $files = getFiles($path);
    if (empty($files)) {
        throw new \Exception("No files there", 1);
    }

    $result = [];
    array_map(function ($file) use (&$result) {
        $code = read($file);
        $result = array_merge($result, lint($code));
    }, $files);

    return $result;
}
