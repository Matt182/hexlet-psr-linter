<?php
namespace HexletPsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract
{
    private $result;
    private $checkers;

    public function prepare($checkers)
    {
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
        if (empty($this->result)) {
            return ["Congratulations! no warnings.\n"];
        }
        return $this->result;
    }
}
