<?php

class Fail
{
    public function foo()
    {

    }

    /**
     * @param       $a
     * @param array $b
     */
    public function bar($a, array $b)
    {
    }

    /**
     * do foo
     */
    public function foobar()
    {
        return true;
    }

    /**
     * does bar and foo
     *
     * @return void
     */
    public function barfoo()
    {
    }

    /**
     * missing
     */
    public function arrayStuff2()
    {
        array_map(
            function ($v) {
                return $v;
            },
            array(1, 2, 3)
        );

        return [3, 2, 1];
    }

    /**
     * missing
     */
    public function arrayStuff2()
    {
        return array_map(
            function ($v) {
                return $v;
            },
            array(1, 2, 3)
        );
    }
}