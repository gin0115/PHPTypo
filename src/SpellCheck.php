<?php

namespace Gin0115\PHPTypo;

use Gin0115\PHPTypo\Config\ConfigLoader;
use Silly\Command\Command;
use Gin0115\PHPTypo\Dictionary\DictionaryProvider;
use Gin0115\PHPTypo\Files\FileList;
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

        $config = (new ConfigLoader(
            dirname(__DIR__, 1),
            $src,
            $dict,
            $minWord
        ))->getConfig();
        dump($config);

        $files = new FileList($config);
        dump($files);






        // PROOF OF CONCEPT.

        $dictionary = (new DictionaryProvider())->language($dict);


        $parser = (new \PhpParser\ParserFactory())
            ->create(\PhpParser\ParserFactory::PREFER_PHP7);

        $traverser     = new \PhpParser\NodeTraverser();

        $file = \dirname(__DIR__, 1) . '/tests/files/ClassNameTypo.php';
        $stmts = $parser->parse(\file_get_contents($file) ?: '');
        $stmts = $traverser->traverse($stmts ?? []);
        foreach ($stmts[0]->stmts as $node) {
            $name = $node->name->name;
            $pieces = preg_split('/(?=[A-Z])/', $name);

            foreach ($pieces ?: [] as $key => $piece) {
                // Only check if word longer than minword
                if (\mb_strlen($piece) >= $minWord && !$dictionary->validWord($piece)) {
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
        }
    }
}
