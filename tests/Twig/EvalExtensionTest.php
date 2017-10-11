<?php

declare(strict_types=1);

namespace Brumann\Twig\Tests;

use Brumann\Twig\EvalExtension;
use PHPUnit\Framework\TestCase;

class EvalExtensionTest extends TestCase
{
    public function testSimpleEval()
    {
        $templates = [
            'simple_eval' => '{{ eval("echo 1+1;") }}',
        ];

        $loader = new \Twig_Loader_Array($templates);
        $twig = new \Twig_Environment($loader);
        $twig->addExtension(new EvalExtension());

        $output = $twig->render('simple_eval');

        $this->assertSame('2', $output);
    }

    public function testNestedEval()
    {
        $templates = [
            'nested_eval' => '{{ eval("eval(\"echo 1+2;\");") }}',
        ];

        $loader = new \Twig_Loader_Array($templates);
        $twig = new \Twig_Environment($loader);
        $twig->addExtension(new EvalExtension());

        $output = $twig->render('nested_eval');

        $this->assertSame('3', $output);
    }
}
