<?php

/**
 * Holds a list of all the files which are to be checked.
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Files;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Gin0115\PHPTypo\Config\Config;
use Gin0115\PHPTypo\Exception\FileException;

class FileList
{

    /**
     * Config
     *
     * @var Config
     */
    protected $config;

    protected $filelist;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->setFileList();
    }

    /**
     * Sets the filelist based on the the source defined
     * in config.
     *
     * @return void
     * @throws FileException (code 200)
     */
    protected function setFileList(): void
    {
        if (!$this->validSource()) {
            throw FileException::invalidsource($this->config->getSource());
        }

        if ($this->isFile()) {
            $this->filelist[] = $this->config->getSource();
        } else {
            $this->setFileListFromDirectory();
        }
    }

    /**
     * Checks if the source defined in the config
     *
     * @return boolean
     */
    protected function validSource(): bool
    {
        return  file_exists($this->config->getSource());
    }

    /**
     * Checks if source is a file or directory.
     *
     * @return boolean
     */
    protected function isFile(): bool
    {
        return !is_dir($this->config->getSource());
    }

    /**
     * Iterates through all directories and fetches all valid filepaths.
     *
     * @return void
     */
    protected function setFileListFromDirectory(): void
    {
        $iterator = new RecursiveDirectoryIterator(
            $this->config->getSource(),
            RecursiveDirectoryIterator::SKIP_DOTS
        );
        foreach (new RecursiveIteratorIterator($iterator) as $file => $info) {
            if ($info->isDir()) {
                continue;
            }

            $this->filelist[$info->getPathname()] = new FileInfo($info->getPathname());
        }
    }

    /**
     * Get the value of filelist
     */
    public function getFileList(): array
    {
        return $this->filelist;
    }
}
