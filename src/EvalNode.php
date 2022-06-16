<?php

declare(strict_types=1);

namespace jæm3l\Twig;

use Twig\Compiler;
use Twig\Node\Node;

class EvalNode extends Node
{
    public function compile(Compiler $compiler): void
    {
        $code = array_reduce($this->nodes, function(string $code, Node $node) {
            return $code . $node->getAttribute('data');
        }, '');

        $compiler
            ->addDebugInfo($this)
            ->write(sprintf('eval("%s;");', addslashes($code)))
        ;
    }
}
