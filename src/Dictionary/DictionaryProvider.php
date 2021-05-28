<?php

declare(strict_types=1);

/**
 * Disctionary Provider/Factory
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Dictionary;

use Generator;
use Gin0115\PHPTypo\Exception\DictionaryException;

class DictionaryProvider
{
    /**
     * All language to wordlist files names relationships.
     *
     * @var array{country:string,filename:string}
     */
    public const WORDLISTS = [
        'en_gb' => 'ukenglish.txt'
    ];
    
    /**
     * Returns a populated dictionary for the passed language.
     *
     * @param string $language
     * @return Dictionary
     * @throws DictionaryException If lagnuage not found (Code 101)
     */
    public function language(string $language): Dictionary
    {
        switch ($language) {
            case 'en_gb':
                $fileName = DictionaryProvider::WORDLISTS['en_gb'];
                $path = \dirname(__DIR__, 2);
                $dictionary = EnglishBritishDictionary::class;
                break;
            
            default:
                throw DictionaryException::invalidLanguage($language);
        }

        return new $dictionary($this->generateWordListArray(
            $path,
            $fileName
        ));
    }

    /**
     * Generates the file list based on the filename and path passed
     *
     * @param string $path
     * @param string $filename
     * @return array<string>
     * @throws DictionaryException If wordlist not found (Code 102)
     */
    protected function generateWordListArray(string $path, string $filename): array
    {
        $fullPath = $path . \DIRECTORY_SEPARATOR . 'wordlists' . \DIRECTORY_SEPARATOR . $filename;
        if (! is_file($fullPath)) {
            throw DictionaryException::wordListNotFound($path);
        }

        $wordList = [];
        foreach ($this->wordListGenerator($fullPath) as $line) {
            $wordList[] = trim(preg_replace(
                '/\s\s+/',
                '',
                \strtolower($line)
            ) ?? '');
        }

        return $wordList;
    }

    /**
     * Reads the passed filepath line by line
     *
     * @param string $filePath
     * @return \Generator<string>
     * @throws DictionaryException If fails to open passed word list. (Code 103)
     */
    protected function wordListGenerator(string $filePath): Generator
    {
        $filePointer = fopen($filePath, 'r');

        if (! \is_resource($filePointer)) {
            throw DictionaryException::failedToReadWordList($filePath);
        }

        try {
            while ($line = fgets($filePointer)) {
                yield $line;
            }
        } finally {
            fclose($filePointer);
        }
    }
}
