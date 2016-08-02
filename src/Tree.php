<?php

namespace HexletPsrLinter;

use PhpParser\NodeTraverser;

function checkTree($tree, $checkers)
{
    $traverser = new NodeTraverser();
    $visitor = new NodeVisitor();
    $visitor->prepare($checkers);
    $traverser->addVisitor($visitor);
    $traverser->traverse($tree);
    return $visitor->getResult();
}
