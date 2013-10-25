# Symfony PSR-2 CodeSniffer ruleset <img src="https://secure.travis-ci.org/ludofleury/symfony-coding-standard.png?branch=master" alt="Build Status" style="max-width:100%;">

Provides a Symfony PSR CodeSniffer ruleset

* PSR-1 & PSR-2
* Symfony standard
* Symfony naming conventions

Strongly inspired by the [OpenSky Symfony2 coding standard](https://github.com/opensky/Symfony2-coding-standard) (forked InterfaceSuffixSniff).
Yet, this ruleset relies on CodeSniffer PSR-1 & 2 sniffs and adds Symfony standards & naming conventions. It also allows chained calls (fluent interface).

## Installation

1. Install phpcs:

        pear install PHP_CodeSniffer

2. Find your PEAR directory:

        pear config-show | grep php_dir

3. Copy, symlink or check out this repo to a folder called Symfony inside the
   phpcs `Standards` directory:

        cd /path/to/pear/PHP/CodeSniffer/Standards
        git clone git://github.com/ludofleury/symfony-coding-standard.git Symfony

4. Select the Symfony ruleset as your default coding standard:

        phpcs --config-set default_standard Symfony

5. Profit

        phpcs path/to/my/file.php


## Pragmatic & opinionated customisations

### Allows fluent-interface chained calls syntax

```php
<?php

    $this
        ->getFoo()
            ->getBar()
            ->getBar()
    ; // This is allowed

    $this->getFoo()  ; // This is a violation

?>
```

## Known limitations

* functions aren't enforced at the moment

## Contributing

If you do contribute code to these sniffs, please make sure it conforms to the PEAR coding standard and that the unit tests still pass.

To check the coding standard, run from the Symfony-coding-standard source root:

        phpcs --ignore=Tests --standard=PEAR . -n

The unit-tests are run from within the PHP_CodeSniffer directory

* get the [CodeSniffer repository](https://github.com/squizlabs/PHP_CodeSniffer)
* symlink, copy or clone this repository at CodeSniffer/Standard/Symfony
* from the CodeSniffer repository root run `phpunit --filter Symfony_ tests/AllTests.php`

## Credit

[OpenSky](https://github.com/opensky) for the [Symfony2 coding standard](https://github.com/opensky/Symfony2-coding-standard)

## Issue

If you spot any missing standard/conventions and don't want to contribute, please open an issue. It will at least be added to this readme.

## Licence

Copyright (c) 2013 Ludovic Fleury

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is furnished
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

