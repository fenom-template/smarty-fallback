<?php

function fenom_compiler_block_literal($tokenizer, \Fenom\Tag $tag)
{
    $tag->tpl->ignore('literal');
}

function fenom_compiler_block_literal_close()
{
}
