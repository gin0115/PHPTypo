<?php

declare(strict_types = 1);

/**
 * Interface for all diictionaries
 * 
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Dictionary;

interface Dictionary {

    /**
     * Checks if the passed word is valid.
     *
     * @param string $word
     * @return boolean
     */
    public function valid_word(string $word): bool;
}