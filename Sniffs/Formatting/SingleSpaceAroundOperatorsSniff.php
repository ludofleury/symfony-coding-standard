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
 * Symfony_Sniffs_Formatting_SingleSpaceAroundOperatorsSniff
 *
 * Throws errors if there's no space around operators.
 * Symfony coding standard specifies:
 * "Add a single space around operators (==, &&, ...);".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     http://symfony.com/doc/current/contributing/code/standards.html
 */
class Symfony_Sniffs_Formatting_SingleSpaceAroundOperatorsSniff implements PHP_CodeSniffer_Sniff
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
        return array(
            T_BITWISE_AND,
            T_BITWISE_OR,
            T_MULTIPLY,
            T_DIVIDE,
            T_PLUS,
            T_MINUS,
            T_MODULUS,
            T_POWER,
            T_BOOLEAN_AND,
            T_BOOLEAN_OR,
            T_IS_EQUAL,
            T_IS_NOT_EQUAL,
            T_IS_IDENTICAL,
            T_IS_NOT_IDENTICAL,
            T_IS_SMALLER_OR_EQUAL,
            T_IS_GREATER_OR_EQUAL,
            T_GREATER_THAN,
            T_LESS_THAN,
            T_STRING_CONCAT,
            T_LOGICAL_AND,
            T_LOGICAL_OR,
            T_LOGICAL_XOR,
            T_SR,
            T_SL,
        );
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


        // if "+" or "-" check if an operation is 3 steps ahead.
        // TODO check for white space between
        if (($tokens[$stackPtr]['type'] === 'T_MINUS' || $tokens[$stackPtr]['type'] === 'T_PLUS')
            && in_array($tokens[$stackPtr + 3]['code'], $this->register())
        ) {
            return;
        }

        if ($this->_isPrevTokenOk($tokens, $stackPtr)
            && $this->_isNextTokenOk($tokens, $stackPtr)
        ) {
            return;
        }

        $phpcsFile->addError(
            'no single space around operator',
            $stackPtr
        );

    }

    /**
     * check if token is ok for operator
     *
     * @param array $tokens   tokens
     * @param int   $stackPtr stack pointer
     *
     * @return bool
     */
    private function _isPrevTokenOk($tokens, $stackPtr)
    {
        $token     = $tokens[$stackPtr - 1];     // todo add boundary check
        $prevToken = $tokens[$stackPtr - 2]; // todo add boundary check

        return $token['type'] === 'T_WHITESPACE' && $token['content'] === ' '
            || $token['type'] === 'T_COMMENT'
            || $token['type'] === 'T_WHITESPACE' && $prevToken['type'] === 'T_WHITESPACE' && substr($prevToken['content'], 0, 1) === "\n";
    }

    /**
     * check if token is ok for operator
     *
     * @param array $tokens   tokens
     * @param int   $stackPtr stack pointer
     *
     * @return bool
     */
    private function _isNextTokenOk($tokens, $stackPtr)
    {
        $token     = $tokens[$stackPtr + 1];     // todo add boundary check
        return $token['type'] === 'T_WHITESPACE' && $token['content'] === ' '
            || $token['type'] === 'T_COMMENT'
            || $token['type'] === 'T_WHITESPACE' && substr($token['content'], 0, 1) === "\n"
            // if "+" or "-" check if an operation is 2 steps before.
            // TODO check for white space between
            || ($tokens[$stackPtr]['type'] === 'T_MINUS' || $tokens[$stackPtr]['type'] === 'T_PLUS')
                && in_array($tokens[$stackPtr - 2]['code'], $this->register());
    }
}
