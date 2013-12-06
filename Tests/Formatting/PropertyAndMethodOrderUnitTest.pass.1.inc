<?php

abstract class Ok
{
    public $prop1 = 'foo';
    protected $prop2 = 'foobar';
    private $prop3;
    public $prop4 = 'yeah';

    public abstract function publicBar();

    public function publicFoo() {
        $a = 1;
    }

    abstract protected function protectedFoo();

    protected function protectedBar($a, $b) {
        $c = 0;
    }

    private function privateFoo($a) {
        $d = 0;
    }

    private function privateBar() {

    }
}
