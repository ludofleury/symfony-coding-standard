<?php

abstract class Ok
{
    public $prop1 = 'foo';

    abstract protected function protectedFoo();

    private function privateFoo($a) {
        $d = 0;
    }

    protected function protectedBar($a, $b) {
        $c = 0;
    }

    public function publicFoo() {
        $a = 1;
    }

    private $prop3;
    protected $prop2 = 'foobar';

    public abstract function publicBar();

    public $prop4 = 'yeah';

    private function privateBar() {

    }
}
