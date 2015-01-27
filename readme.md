Smarty Fallback for Fenom
=====

## Syntax

* Ignoring `@` before modifier. Modifier is always applied to the variable, `{$array|@count}`, `{$array|count}`, `count($array)` are same.
* **Unsupported** Smarty3 `{foreach}` properties are @index, @iteration, @first, @last, @show, @total yet.

## Accessors

| Accessor         | Smarty2  | Smarty3  |
|------------------|:----------:|:----------:|
| `$smarty.get`    | yes      | yes      |
| `$smarty.post`   | yes      | yes      |
| `$smarty.cookie` | yes      | yes      |
| `$smarty.request`| yes      | yes      |
| `$smarty.server` | yes      | yes      |
| `$smarty.env`    | yes      | yes      |
| `$smarty.session`| yes      | yes      |
| `$smarty.const`  | yes      | yes      |
| `$smarty.ldelim` | yes      | yes       |
| `$smarty.rdelim` | yes      | yes       |
| `$smarty.block`  | -        | no        |
| `$smarty.section`*  | no       | no    |
| `$smarty.capture`   | yes       | yes  |
| `$smarty.foreach`   | yes       | -     |
| `$smarty.template`* | no       | no    |
| `$smarty.version`*  | no       | no    |
| `$smarty.current_dir`  | -       | no    |
| `$smarty.template_object`  | -       | no    |
| `$smarty.config`*  | no       | no    |

## Modifiers



## Tags

| Tag       | Smarty2  | Smarty3 |
|-----------|:----------:|:---------:|   
| `assign`  | [yes](http://www.smarty.net/docsv2/en/language.custom.functions.tpl#language.function.assign) | [yes](http://www.smarty.net/docs/en/language.function.assign.tpl)<br />without scope
| `capture` | [yes](http://www.smarty.net/docs/en/language.function.capture.tpl) | [yes](http://www.smarty.net/docs/en/language.function.capture.tpl)
| `foreach` | [yes](http://www.smarty.net/docsv2/en/language.function.foreach.tpl) | [yes](http://www.smarty.net/docs/en/language.function.foreach.tpl)
| `section`* | [no](http://www.smarty.net/docsv2/en/language.function.section.tpl) | [no](http://www.smarty.net/docs/en/language.function.section.tpl)
| `include` | [yes](http://www.smarty.net/docsv2/en/language.function.include.tpl) | [yes](http://www.smarty.net/docs/en/language.function.include.tpl)
| `include_php`** | [no](http://www.smarty.net/docsv2/en/language.function.include_php.tpl) | [no](http://www.smarty.net/docs/en/language.function.include_php.tpl)
| `strip` | [yes](http://www.smarty.net/docsv2/en/language.function.strip.tpl) | [yes](http://www.smarty.net/docs/en/language.function.strip.tpl)
| `if` | [yes](http://www.smarty.net/docsv2/en/language.function.if.tpl) | [yes](http://www.smarty.net/docs/en/language.function.if.tpl)
| `literal` | [yes](http://www.smarty.net/docsv2/en/language.function.literal.tpl) | [yes](http://www.smarty.net/docs/en/language.function.literal.tpl)
| `ldelim`,`rdelim` | [yes](http://www.smarty.net/docsv2/en/language.function.ldelim.tpl) | [yes](http://www.smarty.net/docs/en/language.function.ldelim.tpl)
| `while` | - | [yes](http://www.smarty.net/docs/en/language.function.while.tpl)

* - todo

** - newer