<?php

namespace Fenom\Smarty;


use Fenom\Template;
use Fenom\Tokenizer;

class Accessor {

    public static function foreachCycle() {

    }

    public static function section() {

    }

    public static function capture(Tokenizer $tokens, Template $tpl) {
        $name = $tokens->skip('.')->need(T_STRING)->getAndNext();
        return "(isset(\$captures['{$name}']) ? \$captures['{$name}'] : null)";
    }
} 