<?php

namespace HexletPsrLinter;

use PhpParser\ParserFactory;

function parse(string $code) : array
{
    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

    try {
        return $parser->parse($code);
    } catch (Error $e) {
        echo 'Parse Error: ', $e->getMessage();
    }
}
