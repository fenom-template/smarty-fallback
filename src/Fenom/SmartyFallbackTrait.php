<?php

namespace Fenom;


trait SmartyFallbackTrait {

    private $_trusted = [];

    public function setSmartySupport() {
        /** @var SmartyFallbackTrait|FSEntityLoaderTrait $this */
        $this->addPluginsDir(realpath(__DIR__.'/../../plugins'));
        /* @var \Fenom $this */
        $this->addTagFilter([$this, 'filterTag']);
        $this->addAccessor('capture', 'Fenom\Smarty\Accessor::capture');
        $this->addAccessor('ldelim', 'Fenom\Smarty\Accessor::ldelim');
        $this->addAccessor('rdelim', 'Fenom\Smarty\Accessor::rdelim');
        $this->addAccessor('foreach', 'Fenom\Smarty\Accessor::foreachCycle');
        $this->addBlockCompiler('foreach', 'Fenom\Smarty\Parser::foreachOpen', 'Fenom\Compiler::foreachClose', [
            'foreachelse' => 'Fenom\Compiler::foreachElse',
            'break'       => 'Fenom\Compiler::tagBreak',
            'continue'    => 'Fenom\Compiler::tagContinue',
        ], ['continue', 'break']);
    }

    /**
     * @param string $tag
     * @param Template $tpl
     * @return string
     */
    public function filterTag($tag, Template $tpl) {
        // convert variables
        if(stripos($tag, '$smarty.') !== false) {
            $tag = str_replace('$smarty.', '$.', $tag);
        }
        if(stripos($tag, '|@') !== false) {
            $tag = str_replace('|@', '|', $tag);
        }
        return $tag;
    }

    public function isTrustedResourceDir($path) {
        return isset($this->_trusted[$path]);

    }

    public function isTrustedUri($protocol) {
        return isset($this->_trusted[$protocol]);
    }
} 