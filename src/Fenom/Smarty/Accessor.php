<?php

namespace Fenom\Smarty;


use Fenom\Template;
use Fenom\Tokenizer;

class Accessor {

    public static function foreachCycle(Tokenizer $tokens) {
        $name = $tokens->skip('.')->need(Tokenizer::MACRO_STRING)->getAndNext();
        $prop = $tokens->need('.')->next()->need(T_STRING)->getAndNext();
        return "(isset(\$foreach['{$name}']) ? \$foreach['{$name}']['{$prop}'] : null)";
    }

    public static function section() {

    }

    public static function capture(Tokenizer $tokens, Template $tpl) {
        $name = $tokens->skip('.')->need(T_STRING)->getAndNext();
        return "(isset(\$captures['{$name}']) ? \$captures['{$name}'] : null)";
    }

    public static function ldelim() {
        return '"{"';
    }


    public static function rdelim() {
        return '"}"';
    }
} 