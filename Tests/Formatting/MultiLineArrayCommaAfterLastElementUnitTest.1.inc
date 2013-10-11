<?php

// OK
$a = [1, 2, 3];
$b = array('a', 'b', 'c');

$aa = [
    [1, 2, 3],
    [1, 2, 3],
];

$ba = array(
    [1, 2, 3],
    [1, 2, 3],
);

$bb = array(
    array(1, 2),
    array(1, 2),
);

$ab = [
  array(1, 2),
];

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

$c2 = [0,
    1, 2, 3,
];


// Multiline!
$d = array(0, 1, 2,
);

$d2 = [0, 1, 2,
];

$e = array     (
    1,
);

$f = [1,
2, ];
$f2 = array(1,
2, );

// we defined this as not multiline
$g = array
(1,2);

$h = [




];

$h2 = array(



);

$i = [
    1,



];

