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
 * Symfony_Sniffs_Formatting_OneSpaceAfterCommaSniff
 *
 * Throws errors if there's no single space after a comma.
 * Symfony coding standard specifies:
 * "Add a single space after each comma delimiter;".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @author   Steffen Ritter <steffenritter1@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Sniffs_Formatting_OneSpaceAfterCommaSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array('PHP');

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_COMMA);
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile All the tokens found in the document.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens       = $phpcsFile->getTokens();
        $nextToken    = $tokens[$stackPtr + 1]; // todo add boundary check

        if ($nextToken['type'] === 'T_WHITESPACE'
            && substr($nextToken['content'], 0, 1) === "\n"
        ) {
            return;
        }

        if ($nextToken['type'] === 'T_WHITESPACE'
            && $nextToken['content'] === " "
        ) {
            return;
        }

        // ignore white spaces before comments
        if ($nextToken['type'] === 'T_WHITESPACE'
            && $tokens[$stackPtr + 2]['type'] === 'T_COMMENT'
        ) {
            return;
        }

        if ($nextToken['type'] === 'T_COMMENT') {
            return;
        }

        $phpcsFile->addError(
            'single space after each comma delimiter',
            $stackPtr + 1
        );

        return;
    }
}
