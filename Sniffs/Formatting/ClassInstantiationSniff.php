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
 * Symfony_Sniffs_Formatting_ClassInstantiationSniff
 *
 * Throws errors if parentheses are missing after class instantiation.
 * Symfony coding standard specifies: "Use parentheses when instantiating
 * classes regardless of the number of arguments the constructor has;".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Sniffs_Formatting_ClassInstantiationSniff implements PHP_CodeSniffer_Sniff
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

        $next =  $phpcsFile->findNext($allowedTokens, $stackPtr + 1, null, true);

        if (($next === false) || ($tokens[$next]['type'] !== 'T_OPEN_PARENTHESIS')) {
            $phpcsFile->addError(
                'parenthesis missing after class name',
                $stackPtr
            );
        }
    }
}
