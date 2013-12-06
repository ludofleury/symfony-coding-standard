<?php

class Foo implements Bar,Blubb
{
    public function yo($a,   $b,$c)
    {
        $a = array(1,  2,3);
        $b = array(
            1,    // OK, next has to FAIL trailing space
            2, 
            3,// OK
        );

        $this->yo($a,   $b,3);
        $this->yo(
            $a,    // OK, next has to FAIL trailing space
            $b, 
            3
        );
    }
}

