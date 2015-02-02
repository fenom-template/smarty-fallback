<?php

namespace Fenom\Smarty;


class Util {

    public static function escape($text) {
        return htmlspecialchars($text, ENT_COMPAT, 'UTF-8', false);
    }
} 