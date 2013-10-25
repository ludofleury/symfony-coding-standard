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
 * Symfony_Sniffs_Formatting_ExceptionMessageStringSniff
 *
 * Throws warning if exception message is concatenated with concat operator.
 * Symfony coding standard specifies: "Exception message strings should be
 * concatenated using sprintf.".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Sniffs_Formatting_ExceptionMessageStringSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Registers the token types that this sniff wishes to listen to.
     *
     * @return array
     */
    public function register()
    {
        return array(T_NEW);
    }

    /**
     * Process the tokens that this sniff is listening for.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
     * @param int                  $stackPtr  The position in the stack where
     *                                        the token was found.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $allowedTokens   = PHP_CodeSniffer_Tokens::$emptyTokens;
        $allowedTokens[] = T_STRING;
        $allowedTokens[] = T_NS_SEPARATOR;

        $opener =  $phpcsFile->findNext($allowedTokens, $stackPtr + 1, null, true);

        if ($opener === false
            || ($tokens[$opener]['type'] !== 'T_OPEN_PARENTHESIS')
        ) {
            return;
        }

        $prev = $phpcsFile->findPrevious(
            PHP_CodeSniffer_Tokens::$emptyTokens,
            $opener - 1,
            null,
            true
        );

        if ($prev === false ) {
            return;
        }

        if ($tokens[$prev]['type'] !== 'T_STRING'
            || substr($tokens[$prev]['content'], -9) !== 'Exception'
        ) {
            return;
        }

        $closer = $tokens[$opener]['parenthesis_closer'];

        $concat = $phpcsFile->findNext(T_STRING_CONCAT, $opener + 1, $closer, false);

        if ($concat === false) {
            return;
        }

        $phpcsFile->addWarning(
            'Use sprintf to concat exception message',
            $stackPtr
        );
    }
}
