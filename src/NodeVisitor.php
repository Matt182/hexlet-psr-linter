<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract
{
    private $result;
    private $checkers;

    public function __construct(array $checkers)
    {
        $this->result = [];
        $this->checkers = [];
        foreach ($checkers as $checker) {
            $this->checkers[] = $checker;
        }
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
