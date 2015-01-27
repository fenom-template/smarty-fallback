<?php

namespace Fenom\Smarty;


use Fenom\Compiler;
use Fenom\Error\InvalidUsageException;
use Fenom\Tag;
use Fenom\Template;
use Fenom\Tokenizer;

class Parser {


    public static function parseParams(Tokenizer $tokens, Template $tpl, array $params = []) {
        $key_map = array_keys($params);
        $key_no = 0;
        while ($tokens->valid()) {
            if ($tokens->is(Tokenizer::MACRO_STRING)) {
                $key = $tokens->getAndNext();
//                if (!isset($params[$key])) {
//                    throw new InvalidUsageException("Unknown parameter '$key'");
//                }
                if ($tokens->is("=")) {
                    $tokens->next();
                    if($tokens->is(Tokenizer::MACRO_STRING)) {
                        $params[$key] = "'".$tokens->current()."'";
                        $tokens->next();
                    } else {
                        $params[$key] = $tpl->parseExpr($tokens);
                    }
                } elseif(isset($key_map[$key_no])) {
                    $params[ $key_map[$key_no] ] = "'".$key."'";
                } else {
                    throw new InvalidUsageException("Invalid value for parameter '$key'");
                }
            } elseif ($tokens->is(Tokenizer::MACRO_SCALAR, '"', T_VARIABLE, "[", '(', '$')) {
                if(isset($params[ $key_map[$key_no] ])) {
                    $params[ $key_map[$key_no] ] = $tpl->parseExpr($tokens);
                } else {
                    $params[] = $tpl->parseExpr($tokens);
                }
            } else {
                break;
            }
            $key_no++;
        }

        return $params;
    }

    public static function foreachOpen(Tokenizer $tokens, Tag $tag) {
        $new_format = false;
        while($tokens->valid()) {
            if($tokens->is(T_DOUBLE_ARROW)) {
                $new_format = true;
                break;
            } else {
                $tokens->next();
            }
        }
        $tokens->seek(1);
        if($new_format) {
            return Compiler::foreachOpen($tokens, $tag);
        } else {
            $after = "";
            $tag["after"] = "";
            $tag["else"]  = false;
            $params = self::parseParams($tokens, $tag->tpl, [
                'from' => false,
                'key' => false,
                'item' => false,
                'name' => false,
            ]);
            $v = Template::VAR_NAME;
            $code = "if({$params['from']}) {\n";
            $code .= "\$foreach[{$params['name']}] = array('first' => true, 'last' => false, 'total' => count({$params['from']}), 'index' => 0, 'iteration' => 1, 'show' => false);\n";
            if($params['key']) {
                $code .= " foreach({$params['from']} as {$v}[{$params['key']}] => {$v}[{$params['item']}]) {\n";
            } else {
                $code .= " foreach({$params['from']} as {$v}[{$params['item']}]) {\n";
            }
            if($params["name"]) {
                $after .= "if(\$foreach[{$params['name']}]['first']) \$foreach[{$params['name']}]['first'] = false;\n";
                $after .= "\$foreach[{$params['name']}]['last'] = (\$foreach[{$params['name']}]['index'] == \$foreach[{$params['name']}]['total'] - 1);\n";
                $after .= "\$foreach[{$params['name']}]['index']++;\n";
                $after .= "\$foreach[{$params['name']}]['iteration']++;\n";
                $after .= "\$foreach[{$params['name']}]['show'] = true;\n";
                $tag["after"] = $after;
            }
            return $code;
        }
    }
} 