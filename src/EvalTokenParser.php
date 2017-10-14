<?php

declare(strict_types=1);

namespace jæm3l\Twig;

use Twig\TokenParser\AbstractTokenParser;

class EvalTokenParser extends AbstractTokenParser
{
    public function parse(\Twig_Token $token)
    {
        $stream = $this->parser->getStream();

        $stream->expect( \Twig_Token::BLOCK_END_TYPE );
        $content = $this->parser->subparse([$this, 'decideEvalEnd'], true);
        $stream->expect( \Twig_Token::BLOCK_END_TYPE );

        return new EvalNode([$content], [], $token->getLine(), $this->getTag());
    }

    public function decideEvalEnd(\Twig_Token $token): bool
    {
        return $token->test( 'endeval' );
    }

    public function getTag(): string
    {
        return 'eval';
    }
}
