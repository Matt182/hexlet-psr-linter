<?php
namespace HexletPsrLinter;

use HexletPsrLinter\Checkers\FunctionChecker;
use HexletPsrLinter\Checkers\MethodChecker;
use HexletPsrLinter\Checkers\VariableChecker;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;

function lint(string $code)
{
    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
    $traverser = new NodeTraverser();
    $visitor = new NodeVisitor([
        new FunctionChecker(),
        new MethodChecker(),
        new VariableChecker()
    ]);
    $traverser->addVisitor($visitor);
    try {
        $stmts = $parser->parse($code);
        $traverser->traverse($stmts);
    } catch (\PhpParser\Error $e) {
        throw new \Exception($e->getMessage(), $e->getCode());
    }
    return $visitor->getResult();
}
