<?php

class Pass
{
    /**
     * do foo
     */
    public function foo()
    {

    }

    /**
     * append $a to $b
     *
     * @param string $a string to add
     * @param array  $b array
     */
    public function bar($a, array $b)
    {


    }
    /**
     * do foo
     *
     * @return bool
     */
    public function foobar()
    {
        return true;
    }

    /**
     * do barfoo
     */
    public function barfoo()
    {
        if (1 === 1) {
            return;
        }

        return;
    }

    /**
     * write stuff info
     *
     * @param StuffInfo $info
     */
    public function writeStuffInfo(StuffInfo $info)
    {
    }

    /**
     * @param array $info
     */
    private function writeInfo(array $info)
    {

    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $value;
    }

    /**
     * nice
     */
    public function arrayStuff()
    {
        array_map(
            function ($v) {
                return $v;
            },
            array(1, 2, 3)
        );
    }

    /**
     * @return array
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
     * @return array
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