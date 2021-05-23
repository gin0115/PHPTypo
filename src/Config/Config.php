<?php

declare(strict_types=1);

/**
 * PHP Typo Config Object
 * 
 * Can be used to populated the config value used by PHP Typo
 * 
 * This can either be declared in a phptypo.config.php in your project
 * root or by passing values via the CLI interface.
 * 
 * All commands passed via the CLI, will overwrite the values that
 * have been predeclared.
 */

namespace Gin0115\PHPTypo\Config;

class Config
{

    /**
     * @var string
     */
    protected $projectName;

    /**
     * @var string
     */
    protected $dictionary;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var int
     */
    protected $minWord;

    /**
     * @var string[]
     */
    protected $excludedWords = [];

    /**
     * @var string[]
     */
    protected $bannedWords = [];

    /**
     * @var string
     */
    protected $outputType;

    /**
     * @var string[]
     */
    protected $excludedFiles = [];

    /**
     * Creates a new config object.
     *
     * @param string $projectName
     * @return self
     */
    public static function create(string $projectName): self
    {
        return (new self())->setProjectName($projectName);
    }

    /**
     * Get the value of projectName
     *
     * @return  string
     */
    public function getProjectName(): string
    {
        return $this->projectName;
    }

    /**
     * Set the value of projectName
     *
     * @return  self
     */
    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * Get the value of dictionary
     *
     * @return  string
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }

    /**
     * Set the value of dictionary
     *
     * @param  string  $dictionary
     * @return  self
     */
    public function setDictionary(string $dictionary)
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    /**
     * Get the value of source
     *
     * @return  string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set the value of source
     *
     * @param  string  $source
     * @return  self
     */
    public function setSource(string $source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Get the value of minWord
     *
     * @return  int
     */
    public function getMinWord()
    {
        return $this->minWord;
    }

    /**
     * Set the value of minWord
     *
     * @param  int  $minWord
     * @return  self
     */
    public function setMinWord(int $minWord)
    {
        $this->minWord = $minWord;
        return $this;
    }

    /**
     * Get the value of excludedWords
     *
     * @return  string[]
     */
    public function getExcludedWords()
    {
        return $this->excludedWords;
    }

    /**
     * Set the value of excludedWords
     *
     * @param  string  ...$excludedWords
     * @return  self
     */
    public function setExcludedWords(string ...$excludedWords)
    {
        $this->excludedWords = $excludedWords;
        return $this;
    }

    /**
     * Get the value of bannedWords
     *
     * @return  string[]
     */
    public function getBannedWords()
    {
        return $this->bannedWords;
    }

    /**
     * Set the value of bannedWords
     *
     * @param  string  ...$bannedWords
     * @return  self
     */
    public function setBannedWords(string ...$bannedWords)
    {
        $this->bannedWords = $bannedWords;
        return $this;
    }

    /**
     * Get the value of outputType
     *
     * @return  string
     */
    public function getOutputType()
    {
        return $this->outputType;
    }

    /**
     * Set the value of outputType
     *
     * @param  string  $outputType
     * @return  self
     */
    public function setOutputType(string $outputType)
    {
        $this->outputType = $outputType;
        return $this;
    }

    /**
     * Get the value of excludedFiles
     *
     * @return  string[]
     */ 
    public function getExcludedFiles()
    {
        return $this->excludedFiles;
    }

    /**
     * Set the value of excludedFiles
     *
     * @param  string  ...$excludedFiles
     * @return  self
     */ 
    public function setExcludedFiles(string ...$excludedFiles)
    {
        $this->excludedFiles = $excludedFiles;
        return $this;
    }
}
