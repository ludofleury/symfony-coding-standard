<?php

abstract class Ok
{
    public $prop1 = 'a';

    private static function privateFoo($a) {
        $d = 0;
    }

    protected function protectedBar($a, $b) {
        function bla() {

        }
        $c = 0;
    }

    public function publicFoo() {
        $a = 1;
    }

    private $prop3;
    protected $prop2 = 'foobar';

    abstract protected function protectedFoo();

    public abstract function publicBar();

    public $prop4 = 'yeah';

    private function privateBar() {

    }
}
