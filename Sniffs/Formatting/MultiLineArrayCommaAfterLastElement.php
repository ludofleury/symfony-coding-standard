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
 * Symfony2_Sniffs_Formatting_BlankLineBeforeReturnSniff.
 *
 * Throws errors if there's no blank line before return statements. Symfony
 * coding standard specifies: "Add a blank line before return statements,
 * unless the return is alone inside a statement-group (like an if statement);".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/opensky/Symfony2-coding-standard
 */
class Symfony_Sniffs_Formatting_MultiLineArrayCommaAfterLastElement implements PHP_CodeSniffer_Sniff
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
        // T_OPEN_SHORT_ARRAY
        // T_CLOSE_SHORT_ARRAY
        return array(T_ARRAY);
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
        $tokens = $phpcsFile->getTokens();
        $line   = $tokens[$stackPtr]['line'];

        $arrayStart = $tokens[$stackPtr]['parenthesis_opener'];
        $arrayEnd   = $tokens[$arrayStart]['parenthesis_closer'];

        if ($tokens[$arrayStart]['line'] === $tokens[$arrayEnd]['line']) {
            // single line
            return;
        }

        $lastContent = $phpcsFile->findPrevious(T_WHITESPACE, ($arrayEnd - 1), $arrayStart, true);
        if ($tokens[$lastContent]['line'] !== ($tokens[$arrayEnd]['line'] -1 ) {
            $phpcsFile->addError(
                'Closing parenthesis of an array must be on a new line',
                $arrayEnd,
                'CloseBraceNewLine'
            );
        }

        // find last Item
        // Fail if no comma between last item and $arrayEnd
        


        //
        // $phpcsFile->addError(
            // 'missing comma after each array item in a multi-line array',
            // $stackPtr
        // );
        return;
    }
}
