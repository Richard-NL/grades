<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class QuestionStatisticsCommand extends Command
{
    protected static $defaultName = 'grades:question_statistics';


    protected function configure()
    {
        $this
            ->setDescription('Show statistics to determine the difficulty of a question')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $table = new Table($output);
        $table
            ->setHeaders(['Question', 'P’-value', 'R-value'])
            ->setRows([
                          ['Question 1', 1, 1],
                          ['Question 2', 0, 0],
                          ['Question 3', 0.1, -1],
                          ['Question 4', 0.5, 0.55],
                      ])
        ;
        $table->render();
        return Command::SUCCESS;
    }
}
