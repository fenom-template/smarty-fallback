Smarty Fallback for Fenom
=====

## Syntax


## Accessors

| Accessor         | Smarty2  | Smarty3 |
|------------------|----------|---------|
| `$smarty.get`    | yes      | yes     |
| `$smarty.post`   | yes      | yes     |
| `$smarty.cookie` | yes      | yes     |
| `$smarty.request`| yes      | yes     |
| `$smarty.server` | yes      | yes     |
| `$smarty.env`    | yes      | yes     |
| `$smarty.session`| yes      | yes     |
| `$smarty.const`  | yes      | yes     |
| `$smarty.ldelim` | no       | no     |
| `$smarty.rdelim` | no       | no     |
| `$smarty.block`  | -       | no     |
| `$smarty.section`*  | no       | -     |
| `$smarty.foreach`*  | no       | -     |
| `$smarty.template`* | no       | no    |
| `$smarty.version`*  | no       | no    |

## Modifiers



## Tags

| Tag       | Smarty2  | Smarty3 |
|-----------|----------|---------|   
| `assign`  | [yes](http://www.smarty.net/docsv2/en/language.custom.functions.tpl#language.function.assign) | [yes](http://www.smarty.net/docs/en/language.function.assign.tpl) **(without scope)**
| `capture` | [yes](http://www.smarty.net/docs/en/language.function.capture.tpl) | [yes](http://www.smarty.net/docs/en/language.function.capture.tpl)
| `foreach`* | [no](http://www.smarty.net/docsv2/en/language.function.foreach.tp) | [no](http://www.smarty.net/docs/en/language.function.foreach.tpl)
| `section` | [no](http://www.smarty.net/docsv2/en/language.function.section.tp) | [no](http://www.smarty.net/docs/en/language.function.section.tpl)
| `include` | [no](http://www.smarty.net/docsv2/en/language.function.include.tp) | [yes](http://www.smarty.net/docs/en/language.function.include.tpl)
| `include_php`** | [no](http://www.smarty.net/docsv2/en/language.function.include_php.tp) | [no](http://www.smarty.net/docs/en/language.function.include_php.tpl)
| `strip` | [yes](http://www.smarty.net/docsv2/en/language.function.strip.tp) | [yes](http://www.smarty.net/docs/en/language.function.strip.tpl)
| `if` | [yes](http://www.smarty.net/docsv2/en/language.function.if.tp) | [yes](http://www.smarty.net/docs/en/language.function.if.tpl)
| `literal` | [yes](http://www.smarty.net/docsv2/en/language.function.literal.tp) | [yes](http://www.smarty.net/docs/en/language.function.literal.tpl)
| `ldelim`,`rdelim` | [yes](http://www.smarty.net/docsv2/en/language.function.ldelim.tp) | [yes](http://www.smarty.net/docs/en/language.function.ldelim.tpl)

* - todo
** - newer