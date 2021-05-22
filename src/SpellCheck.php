<?php

namespace Gin0115\PHPTypo;

use Silly\Command\Command;
use Silly\Input\InputOption;
use Silly\Edition\PhpDi\Application;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\OutputInterface;

class SpellCheck extends Command {

    /**
     * @param OutputInterface $output
     * @param Input $input
     * @return void
     */
    public function __invoke( $src, $dict, $minWord, OutputInterface $output, //phpcs:disable PEAR.Functions.ValidDefaultValue.NotAtEnd -- no control over arg order
        Input $input
    ) {
        $output->writeln($src);
        $output->writeln($dict);
        $output->writeln($minWord);
    }
}