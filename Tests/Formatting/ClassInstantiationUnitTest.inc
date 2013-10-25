<?php

$e = new Exception();
$e = new Exception ('test');
$e = new Exception/* Bar  */('test', 0);
$f = new Exception;
$e = is_null(new Exception());
$e = is_null(new Exception     ('test'));
$e = is_null(new Exception/* Bar */('test', 0));
$f = is_null(new Exception);
$f = is_null(new Exception/* ('foo') */);
$e = new Exception(new Bla, (int) '3');