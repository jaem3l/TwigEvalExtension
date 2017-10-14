<?php

declare(strict_types=1);

namespace jæm3l\Twig\Tests;

use jæm3l\Twig\EvalExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class EvalExtensionTest extends TestCase
{
    public function testSimpleEval()
    {
        $templates = [
            'simple_eval' => '{{ eval("echo 1+1;") }}',
        ];

        $loader = new ArrayLoader($templates);
        $twig = new Environment($loader);
        $twig->addExtension(new EvalExtension());

        $output = $twig->render('simple_eval');

        $this->assertSame('2', $output);
    }

    public function testNestedEval()
    {
        $templates = [
            'nested_eval' => '{{ eval("eval(\"echo 1+2;\");") }}',
        ];

        $loader = new ArrayLoader($templates);
        $twig = new Environment($loader);
        $twig->addExtension(new EvalExtension());

        $output = $twig->render('nested_eval');

        $this->assertSame('3', $output);
    }
}
