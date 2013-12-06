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
 * Symfony_Sniffs_Formatting_MultiLineArrayCommaAfterLastElementSniff
 *
 * Throws errors if there's no comma after the last item in a multi-line array.
 * Symfony coding standard specifies: "Add a comma after each array item in a
 * multi-line array, even after the last one;".
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2
 * @author   Xaver Loppenstedt <xaver@loppenstedt.de>
 * @author   Steffen Ritter <steffenritter1@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     http://symfony.com/doc/current/contributing/code/standards.html
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
            if ($tokens[$i]['type'] !== 'T_WHITESPACE'
                && $tokens[$i]['type'] !== 'T_COMMENT'
            ) {
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
