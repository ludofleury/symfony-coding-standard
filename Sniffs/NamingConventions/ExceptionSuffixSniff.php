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
 * Symfony_Sniffs_NamingConventions_ExceptionSuffixSniff.
 *
 * Throws errors if exception names are not suffixed with "Exception".
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  MIT License
 * @link     https://github.com/ludofleury/Symfony-coding-standard
 */
class Symfony_Sniffs_NamingConventions_ExceptionSuffixSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_EXTENDS);
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
        $tokens   = $phpcsFile->getTokens();
        $line     = $tokens[$stackPtr]['line'];

        $originalStackPtr = $stackPtr;
        $extendsException = false;

        while ($tokens[$stackPtr]['line'] == $line) {
            if ('T_STRING' == $tokens[$stackPtr]['type']) {
                if (substr($tokens[$stackPtr]['content'], -9) == 'Exception') {
                    $extendsException = true;
                }
                break;
            }
            $stackPtr++;
        }

        if ($extendsException === false) {
            return;
        }

        $stackPtr = $originalStackPtr;

        while ($tokens[$stackPtr]['line'] == $line) {
            if ('T_STRING' == $tokens[$stackPtr]['type']) {
                if (substr($tokens[$stackPtr]['content'], -9) != 'Exception') {
                     $phpcsFile->addError(
                         'Exception name is not suffixed with "Exception"',
                         $stackPtr
                     );
                }
                break;
            }
            $stackPtr--;
        }

        return;
    }
}
