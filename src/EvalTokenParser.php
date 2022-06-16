<?php

declare(strict_types=1);

namespace jæm3l\Twig;

use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

class EvalTokenParser extends AbstractTokenParser
{
    public function parse(Token $token)
    {
        $stream = $this->parser->getStream();

        $stream->expect(Token::BLOCK_END_TYPE);
        $content = $this->parser->subparse([$this, 'decideEvalEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new EvalNode([$content], [], $token->getLine(), $this->getTag());
    }

    public function decideEvalEnd(Token $token): bool
    {
        return $token->test('endeval');
    }

    public function getTag(): string
    {
        return 'eval';
    }
}
