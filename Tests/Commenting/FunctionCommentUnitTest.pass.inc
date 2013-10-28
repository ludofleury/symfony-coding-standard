<?php

class Pass
{
    /**
     * do foo
     */
    public function foo() {

    }

    /**
     * append $a to $b
     *
     * @param string $a string to add
     * @param array  $b array
     */
    public function bar($a, array $b) {


    }
    /**
     * do foo
     *
     * @return bool
     */
    public function foobar() {
        return true;
    }

    /**
     * do barfoo
     */
    public function barfoo() {
        if (1 === 1) {
            return;
        }

        return;
    }
}