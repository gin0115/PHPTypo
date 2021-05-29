<?php

/**
 * Dictionary Exceptions
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Reader;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;

class FileParser
{
    protected $parser;

    protected $traverser;

    public function __construct()
    {
        $this->parser = ( new ParserFactory() )->create(ParserFactory::PREFER_PHP7);

        $this->traverser = new NodeTraverser();
    }

    /**
     * Returns an array of nodes from the passed file.
     *
     * @param string $file
     * @return array
     */
    public function getParsedTraverser(string $file): array
    {
        $nodes = $this->parser->parse($file);
        return $this->traverser->traverse($nodes);
    }
}
