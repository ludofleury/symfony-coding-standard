<?php

class Foo implements Bar, Blubb, /* Bar, */Mega
{
    public function yo($a, $b, $c)
    {
        $a = array(1, 2, 3);
        $b = array(
            1,   // OK
            2,
            3,   // OK
        );

        $this->yo($a, $b, 3);
        $this->yo(
            $a, // OK
            $b,
            3
        );
    }
}

