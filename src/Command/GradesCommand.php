<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GradesCommand extends Command
{
    protected static $defaultName = 'grades:show';

    protected function configure()
    {
        $this
            ->setDescription('Shows the grades of students');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $table = new Table($output);
        $table
            ->setHeaders(['Student', 'Grade', 'Status'])
            ->setRows(
                [
                    ['Jake', 1, $this->determineStatusText(1)],
                    ['Catz', 3, $this->determineStatusText(3)],
                    ['Daisy', 5.5, $this->determineStatusText(5.5)],
                    ['Hektor', 10, $this->determineStatusText(10)],
                ]
            );
        $table->render();

        return Command::SUCCESS;
    }


    private function determineStatusText(float $grade): string
    {
        return $grade < 5.5
            ? '<error>Failed</error>'
            : '<info>Passed</info>';
    }
}
