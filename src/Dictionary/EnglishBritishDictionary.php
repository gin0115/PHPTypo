<?php

declare(strict_types=1);

/**
 * Interface for all diictionaries
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Dictionary;

class EnglishBritishDictionary implements Dictionary
{

    /**
     * The list of words for the dictionary.
     *
     * @var array<string>
     */
    protected $wordList;

    /**
     * @param array<string> $wordList
     */
    public function __construct(array $wordList)
    {
        $this->wordList = $wordList;
    }

    /**
     * Checks if the passed word is valid.
     *
     * @param string $word
     * @return boolean
     */
    public function validWord(string $word): bool
    {
        return in_array(\strtolower($word), $this->wordList, true);
    }
}
