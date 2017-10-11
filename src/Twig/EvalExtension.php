<?php

declare(strict_types=1);

namespace Brumann\Twig;

class EvalExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_Function(
                'eval',
                function (string $code) {
                    return eval($code);
                }
            )
        ];
    }
}
