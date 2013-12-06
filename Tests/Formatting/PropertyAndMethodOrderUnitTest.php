<?php

/**
 * This file is part of the Symfony2-coding-standard (phpcs standard)
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Symfony2-phpcs-authors <Symfony2-coding-standard@opensky.github.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @version  GIT: master
 * @link     https://github.com/opensky/Symfony2-coding-standard
 */

/**
 * Unit test class for the PropertyAndMethodOrder sniff.
 *
 * A sniff unit test checks a .inc file for expected violations of a single
 * coding standard. Expected errors and warnings are stored in this class.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Xaver Loppenstedt <xaver@loppenstedt.de>
 * @author    Steffen Ritter <steffenritter1@gmail.com>
 * @copyright 2013 Xaver Loppenstedt, some rights reserved.
 * @license   http://spdx.org/licenses/MIT MIT License
 * @link      http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Tests_Formatting_PropertyAndMethodOrderUnitTest extends AbstractSniffUnitTest
{
    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @param string $testFile test file
     *
     * @return array(int => int)
     */
    protected function getErrorList($testFile = '')
    {
        switch ($testFile) {
        case 'PropertyAndMethodOrderUnitTest.pass.1.inc':
            return array();
        case 'PropertyAndMethodOrderUnitTest.fail.1.inc':
            return array(
                11 => 1,
                18 => 1,
                22 => 1,
                23 => 1,
                25 => 1,
                27 => 1,
                29 => 1
            );
        case 'PropertyAndMethodOrderUnitTest.fail.2.inc':
            return array(
                13 => 1,
                17 => 1,
                21 => 1,
                22 => 1,
                24 => 1,
                26 => 1
            );
        }

        return null;

    }

    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @return array(int => int)
     */
    protected function getWarningList()
    {
        return array();
    }
}
 