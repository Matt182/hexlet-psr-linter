<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract
{
    private $result;
    private $checkers;

    public function __construct($checkers)
    {
        $this->result = [];
        $this->checkers = $checkers;
    }

    public function enterNode(Node $node)
    {
        foreach ($this->checkers as $checker) {
            if ($checker->accept($node)) {
                $error = $checker->check($node);
                if (!empty($error)) {
                    $this->result[] = $error;
                }
            }
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}
