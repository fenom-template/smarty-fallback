<?php

function fenom_compiler_assign(\Fenom\Tokenizer $tokenizer, \Fenom\Tag $tag)
{
    $tpl = $tag->tpl;
    $params = $tpl->parseParams($tokenizer);
    return $tpl::VAR_NAME.'['.$params['var'].'] = '.$params['value'];
}
