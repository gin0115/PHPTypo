<?php

/**
 * Single file isntance.
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Files;

use SplFileInfo;
use Gin0115\PHPTypo\Exception\FileException;

class FileInfo extends SplFileInfo
{
    /**
     * Returns the contents of the file.
     *
     * @throws FileException (code 201)
     * @return string
     */
    public function getContents(): string
    {
        if (!$this->isReadable()) {
            throw FileException::fileUnReadabale($this->getPathname());
        }

        return \file_get_contents($this->getPathname()) ?: '';
    }
}
