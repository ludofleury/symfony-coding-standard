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
 * Unit test class for the MultiLineArrayCommaAfterLastElementTest sniff.
 *
 * A sniff unit test checks a .inc file for expected violations of a single
 * coding standard. Expected errors and warnings are stored in this class.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Xaver Loppenstedt <xaver@loppenstedt.de>
 * @copyright 2012 Xaver Loppenstedt, some rights reserved.
 * @license   http://spdx.org/licenses/MIT MIT License
 * @link      http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Tests_Formatting_MultiLineArrayCommaAfterLastElementUnitTest extends AbstractSniffUnitTest
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
    public function getErrorList($testFile = '')
    {
        switch ($testFile) {
        case 'MultiLineArrayCommaAfterLastElementUnitTest.1.inc':
            return array();
        case 'MultiLineArrayCommaAfterLastElementUnitTest.2.inc':
        case 'MultiLineArrayCommaAfterLastElementUnitTest.3.inc':
            return array(
                7  => 1,
                12 => 1,
                17 => 1,
                21 => 1,
                25 => 1,
                28 => 1,
                32 => 1,
                35 => 1,
                42 => 1,
                47 => 1,
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
    public function getWarningList()
    {
        return array();
    }
}
