<?php

declare(strict_types=1);

/**
 * File Exceptions
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Exception;

use Exception;

class FileException extends Exception
{

    /**
     * Exceptions for invalid language
     *
     * @code 200
     * @param string $source
     * @return self
     */
    public static function invalidsource(string $source): self
    {
        return new self("{$source} contains no files or directories", 200);
    }

    /**
     * Exception for unreadable file.
     *
     * @code 201
     * @param string $filePath
     * @return self
     */
    public static function fileUnReadabale(string $filePath): self
    {
        return new self("{$filePath} is not a readable file", 201);
    }
}
