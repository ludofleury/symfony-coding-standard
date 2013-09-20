<?php

// OK
$a = [1, 2, 3];
$b = array('a', 'b', 'c');

$a2 = [
    0,
    1,
    2,
];

$b2 = array(
    'x',
    'y',
    'z',
);

// PSR1, PSR2 and Symfony Code Styles says nothing about that each values has to be in own line
$c = array(0,
    1, 2, 3,
);

// Multiline!
$d = array(0, 1, 2,
);
