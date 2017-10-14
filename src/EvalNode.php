<?php

declare(strict_types=1);

namespace jæm3l\Twig;

use Twig\Node\Node;

class EvalNode extends Node
{
    public function compile(\Twig_Compiler $compiler): void
    {
        $code = array_reduce($this->nodes, function(string $code, \Twig_Node $node) {
            return $code . $node->getAttribute('data');
        }, '');

        $compiler
            ->addDebugInfo($this)
            ->write(sprintf('eval("%s;");', addslashes($code)))
        ;
    }
}
