<?php

/**
 * Abstract for all report elements
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Report\Element;

use SplFileInfo;

abstract class AbstractElement
{
    /**
     * The file which this element belongs to.
     *
     * @var SplFileInfo
     */
    protected $file;
    
    /**
     * Line of this element in file.
     *
     * @var int
     */
    protected $line;
    
    /**
     * The element contents.
     *
     * @var string
     */
    protected $contents = '';
    
    /**
     * All word offsets which have typos
     *
     * @var array{position:int,string:word}
     */
    protected $typos = [];

    public function __construct(
        SplFileInfo $file,
        int $line,
        string $contents,
        array $typos = []
    ) {
        $this->file = $file;
        $this->line = $line;
        $this->contents = $contents;
        $this->typos = $typos;
    }

    /**
     * Is element valid or error.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return is_array($this->typos) && $this->typoCount() === 0;
    }

   /**
    * Returns the count of typos
    *
    * @return int
    */
    public function typoCount(): int
    {
        return count($this->typos);
    }

    /**
     * Get the file which this element belongs to.
     *
     * @return SplFileInfo
     */
    public function getFile(): SplFileInfo
    {
        return $this->file;
    }

    /**
     * Get line of this element in file.
     *
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * Get the element contents.
     *
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }

    /**
     * Pushes a typo to the typo stack
     *
     * @param int $position
     * @param string $word
     * @return self
     */
    public function addTypo(int $position, string $word): self
    {
        $this->typos[$position] = $word;
        return $this;
    }

    /**
     * Returns the element type.
     *
     * @return string
     */
    abstract public function getType(): string;

    /**
     * Get all word offsets which have typos
     *
     * @return array{position:int,string:word}
     */
    public function getTypos(): array
    {
        return $this->typos;
    }
}
