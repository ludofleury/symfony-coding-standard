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
 * Unit test class for the ClassCommenting sniff.
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
class Symfony_Tests_Commenting_ClassCommentUnitTest extends AbstractSniffUnitTest
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
        case 'ClassCommentUnitTest.pass.1.inc':
        case 'ClassCommentUnitTest.pass.2.inc':
            return array();
        case 'ClassCommentUnitTest.fail.1.inc':
            return array(3 => 1);
        case 'ClassCommentUnitTest.fail.2.inc':
            return array(
                6 => 1,
                7 => 1,
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
