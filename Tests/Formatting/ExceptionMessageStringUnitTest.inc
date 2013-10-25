<?php

$e = new Exception();
$e = new Exception('ouch!');
$e = new Exception($s);
$f = new Exception('ouch!:' . $s);
throw new Exception('ouch!:' . $s);
throw new Exception('ouch!:' /* bar */ . $s);
throw new Exception    ('ouch!:'     . $s);
$e = new Mega\SuperException("Ouch!: $s");  // namespace
$e = new FileException("Ouch!: {$s}");
$e = new Exception(
    sprintf(
        "ouch!: %s",
        $s
    ),
    0
);
$e = new ExceptionHandler('a' . 'b'); // this is not an exception

