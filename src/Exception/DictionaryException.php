<?php

declare(strict_types=1);

/**
 * Dictionary Exceptions
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Exception;

use Exception;

class DictionaryException extends Exception
{

    /**
     * Exceptions for invalid language
     *
     * @code 101
     * @param string $language
     * @return self
     */
    public static function invalidLanguage(string $language): self
    {
        return new self("{$language} is not a valid language", 101);
    }

    /**
     * Exceptions for error generating wordlist array.
     *
     * @code 102
     * @param string $path
     * @return self
     */
    public static function wordListNotFound(string $path): self
    {
        return new self("Failed to open wordlist at {$path}", 102);
    }

    /**
     * Exception for failure to read file from filepath.
     *
     * @code 103
     * @param string $filepath
     * @return self
     */
    public static function failedToReadWordList(string $filepath): self
    {
        return new self("Failed to read wordlist at {$filepath}", 103);
    }
}
