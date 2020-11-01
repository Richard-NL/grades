<?php

namespace App\Command;

use App\Question\QuestionStatisticProcessor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class QuestionStatisticsCommand extends Command
{
    protected static $defaultName = 'grades:question_statistics';


    private QuestionStatisticProcessor $questionStatisticProcessor;

    public function __construct(QuestionStatisticProcessor $questionStatisticProcessor)
    {
        parent::__construct();

        $this->questionStatisticProcessor = $questionStatisticProcessor;
    }

    protected function configure()
    {
        $this->setDescription('Show statistics to determine the difficulty of a question');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $table = new Table($output);
        $table->setHeaders(['Question', 'P’-value', 'R-value']);

        $index = 0;
        foreach ($this->questionStatisticProcessor->questionStatistics() as $questionName => $questionStatistic) {
            $table->setRow($index, [$questionName, $questionStatistic['p'], $questionStatistic['r']]);
            $index++;
        }

        $table->render();

        return Command::SUCCESS;
    }
}
