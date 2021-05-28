<?php

namespace Gin0115\PHPTypo;

use SplFileInfo;
use Silly\Command\Command;
use Gin0115\PHPTypo\Dictionary\DictionaryProvider;
use Gin0115\PHPTypo\Report\Element\ElementFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SpellCheck extends Command
{

    /**
     * @param string $src
     * @param string $dict
     * @param string $minWord
     * @param OutputInterface $output
     * @param InputInterface $input
     * @return void
     */
    public function __invoke(
        string $src,
        string $dict,
        string $minWord,
        OutputInterface $output, //phpcs:disable PEAR.Functions.ValidDefaultValue.NotAtEnd -- no control over arg order
        InputInterface $input
    ) {
        // PROOF OF CONCEPT.
        
        $dictionary = (new DictionaryProvider())->language($dict);


        $parser = (new \PhpParser\ParserFactory())
            ->create(\PhpParser\ParserFactory::PREFER_PHP7);

        $traverser     = new \PhpParser\NodeTraverser();

        $file = \dirname(__DIR__, 1) . '/tests/files/ClassNameTypo.php';
        
        $factory = new ElementFactory(new SplFileInfo($file));
        // dump($factory);
        

        $stmts = $parser->parse(\file_get_contents($file) ?: '');
        $stmts = $traverser->traverse($stmts ?? []);
        foreach ($stmts[0]->stmts as $node) {
            $name = trim($node->name->name);
            $pieces = array_values(
                array_filter(
                    preg_split('/(?=[A-Z])/', $name),
                    function ($piece) {
                        return \mb_strlen($piece) !== 0;
                    }
                )
            );
            $classReport = $factory->createClass(
                $node->name->getStartLine(),
                $name
            );
            foreach ($pieces ?: [] as $key => $piece) {
                // Only check if word longer than minword
                if (\mb_strlen($piece) >= $minWord && ! $dictionary->validWord($piece)) {
                    $classReport->addTypo($key, $piece);
                    $output->writeln(
                        \sprintf(
                            "(Class Name : %s) %s not found in %s dictionary on line %d of %s",
                            $name,
                            $piece,
                            $dict,
                            $node->name->getStartLine(),
                            basename($file)
                        )
                    );
                }
            }

            dump(
                $classReport,
                $classReport->isValid(),
                $classReport->typoCount(),
                $classReport->getType(),
                $classReport->getTypos()
            );
        }
    }
}
