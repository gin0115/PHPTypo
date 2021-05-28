<?php

/**
 * Factory for creating elements with a defined file.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Report\Element;

use SplFileInfo;
use Gin0115\PHPTypo\Report\Element\ClassElement;
use Gin0115\PHPTypo\Report\Element\InterfaceElement;

class ElementFactory
{

    /**
     * The file which this element belongs to.
     *
     * @var SplFileInfo
     */
    protected $file;

    public function __construct(SplFileInfo $file)
    {
        $this->file = $file;
    }

    /**
     * Create a class element.
     *
     * @param int $line
     * @param string $contents
     * @param array $errors
     * @return ClassElement
     */
    public function createClass(int $line, string $contents, array $errors = []): ClassElement
    {
        return new ClassElement($this->file, $line, $contents, $errors);
    }

    /**
     * Create a interface element.
     *
     * @param int $line
     * @param string $contents
     * @param array $errors
     * @return InterfaceElement
     */
    public function createInterface(int $line, string $contents, array $errors = []): InterfaceElement
    {
        return new InterfaceElement($this->file, $line, $contents, $errors);
    }
}
