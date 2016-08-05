<?php

namespace HexletPsrLinter;

use PhpParser\ParserFactory;

function parse(string $code) : array
{
    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
    return $parser->parse($code);
}
