<?php

function fenom_compiler_block_capture(\Fenom\Tokenizer $tokenizer, \Fenom\Tag $tag)
{
    $tpl = $tag->tpl;
    $params = $tpl->parseParams($tokenizer, [
        "name" => false,
        "assign" => false,
        "append" => false,
    ]);
    $tag['name'] = $params['name'];
    $tag['assign'] = $params['assign'];
    $tag['append'] = !empty($params['append']);
    return 'ob_start()';
}

function fenom_compiler_block_capture_close($tokenizer, \Fenom\Tag $tag)
{
    if($tag['assign']) {
        return \Fenom\Template::VAR_NAME."[{$tag['assign']}] = ob_get_clean()";
    } elseif($tag['name']) {
        return "\$captures[{$tag['name']}] = ob_get_clean()";
    } else {
        return "ob_end_flush()";
    }
}
