<?php

namespace Fenom;

class SmartyTest extends TestCase {
    /**
     * @var \Fenom\Smarty
     */
    public $fenom;

    public function setUp() {
        parent::setUp();
        $this->fenom = Smarty::factory(FENOM_RESOURCES . '/template', FENOM_RESOURCES . '/compile');
        $this->fenom->setSmartySupport();
        $_GET['one'] = 1;
        $_GET['map'] = "pro-q3dm6";
    }

    /**
     * @group sb
     */
    public function _testSandbox() {
        try {
//            var_dump($this->fenom->compileCode('{assign var="var1" value="val1"}')->getBody());
//            var_dump($this->fenom->compileCode('{assign var="var1" value=$smarty.get.var1|@upper}')->getBody());
            var_dump($this->fenom->compileCode("{capture name='magic_cap'}captured data{/capture}{\$smarty.capture.magic_cap|upper}")->getBody());
//            var_dump($this->fenom->compileCode('{foreach from=$list item="i" key="k" name="lister"} {$smarty.foreach.list.index} {/foreach}')->getBody());
        } catch(\Exception $e) {
            echo $e;
        }

        exit(1);
    }

    /**
     * @group testLiteral
     */
    public function testLiteral() {
        $this->assertRender("{literal}{\$a + c}{/literal}", '{$a + c}');
    }

    /**
     * @group testDelims
     */
    public function testDelims() {
        $this->assertRender("{rdelim}|{ldelim}", '}|{');
    }

    public static function providerAssign() {
        return [
            ['var1', '"val1"'],
            ['var1', '$one+1'],
            ['var1', '$smarty.get.one'],
            ['var1', '$smarty.get.map|upper'],
            ['var1', '$smarty.get.map|@upper'],
        ];
    }

    /**
     * @dataProvider providerAssign
     * @group testAssign
     */
    public function testAssign($name, $value) {
        $this->assertRender("{assign var='$name' value=$value}{if $$name == $value}true{else}false{/if}", 'true');
    }

    /**
     * @dat aProvider providerAssign
     * @group testCapture
     */
    public function testCapture() {
        $this->assertRender("{capture assign='cap'}captured data{/capture}{\$cap|upper}", 'CAPTURED DATA');
        $this->assertRender("{capture name='magic_cap'}captured data{/capture}{\$smarty.capture.magic_cap|upper}", 'CAPTURED DATA');
    }

    public function testGlobals() {
        var_dump($this->fenom->compileCode('{$smarty.get.one}')->getBody());
        var_dump($this->fenom->compileCode('{$smarty.session.one}')->getBody());
        var_dump($this->fenom->compileCode('{$smarty.foreach.one.index}')->getBody());
    }

    public function testAssignTag() {

//        var_dump($fenom->compile('smarty/assign.tpl')->fetch([]));

//        var_dump($fenom->compileCode('{assign var="a" value="sdf sf "}')->getBody());
//        var_dump($fenom->compileCode('{assign var="a" value="sdf sf {$c.d.e} $d "}')->getBody());
//        var_dump($fenom->compileCode('{assign var="a" value=$a+1}')->getBody());
    }

}