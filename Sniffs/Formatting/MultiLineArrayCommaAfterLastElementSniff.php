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
 * unless the return is alone inside a statement-group (like an if statement);"
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/opensky/Symfony2-coding-standard
 */
class Symfony_Sniffs_Formatting_MultiLineArrayCommaAfterLastElementSniff implements PHP_CodeSniffer_Sniff
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
        return array(T_ARRAY, T_OPEN_SHORT_ARRAY);
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
        $currentToken = $tokens[$stackPtr];

        if ($currentToken['type'] === 'T_ARRAY') {
            $arrayStart = $currentToken['parenthesis_opener'];
            $arrayEnd   = $currentToken['parenthesis_closer'];
        } else {
            $arrayStart = $currentToken['bracket_opener'];
            $arrayEnd   = $currentToken['bracket_closer'];
        }

        if ($tokens[$arrayStart]['line'] === $tokens[$arrayEnd]['line']) {
            // single line
            return;
        }

        for ($i = $arrayEnd - 1; $i > $arrayStart; $i--) {
            if ($tokens[$i]['type'] !== 'T_WHITESPACE') {
                if ($tokens[$i]['type'] !== 'T_COMMA') {
                    $phpcsFile->addError(
                        'Comma missing after last array item',
                        $i,
                        'CommaMissing'
                    );
                }

                return;
            }
        }

        return;
    }
}
