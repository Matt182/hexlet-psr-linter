<?php

namespace HexletPsrLinter;

function read(string $path) : string
{
    return file_get_contents($path);
}

function getFiles($path) : array
{
    $targetFiles = [];
    if (is_dir($path)) {
        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iter as $innerPath) {
            if ($innerPath->isFile() && $innerPath->getExtension() == 'php') {
                $targetFiles[] = $innerPath->getPathname();
            }
        }
    } else {
        if (is_file($path)) {
            $targetFiles[] = $path;
        }
    }
    return $targetFiles;
}
