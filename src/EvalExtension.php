<?php

declare(strict_types=1);

namespace jæm3l\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class EvalExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('eval', 'eval'),
        ];
    }
    
    public function getFilters(): array
    {
        return [
            new TwigFilter('eval', 'eval'),
        ];
    }

    public function getTokenParsers(): array
    {
        return [
            new EvalTokenParser(),
        ];
    }
}
