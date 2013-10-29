<?php
/**
 * This file is part of the Symfony-coding-standard (phpcs standard)
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Ludovic Fleury <ludo.fleury@gmail.com>
 * @license  MIT License
 * @link     https://github.com/ludofleury/Symfony-coding-standard
 */

/**
 * Unit test class for the FunctionCommenting sniff.
 *
 * A sniff unit test checks a .inc file for expected violations of a single
 * coding standard. Expected errors and warnings are stored in this class.
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @author   Steffen Ritter <steffenritter1@gmail.com>
 * @license  MIT License
 * @link     https://github.com/ludofleury/Symfony-coding-standard
 */
class Symfony_Tests_Commenting_FunctionCommentUnitTest extends AbstractSniffUnitTest
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
    public function getErrorList($testFile='')
    {
        switch ($testFile) {
        case 'FunctionCommentUnitTest.pass.inc':
            return array();
        case 'FunctionCommentUnitTest.fail.inc':
            return array(
                5  => 1,
                10 => 5,
                11 => 2,
                18 => 1,
                26 => 1,
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
