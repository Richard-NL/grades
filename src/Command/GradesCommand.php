<?php

namespace App\Command;

use App\Grade\GradeResultProcessor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GradesCommand extends Command
{
    protected static $defaultName = 'student-test:grades';

    /**
     * @var GradeResultProcessor
     */
    private GradeResultProcessor $testResultProcessor;

    public function __construct(GradeResultProcessor $testResultProcessor)
    {
        parent::__construct();
        $this->testResultProcessor = $testResultProcessor;
    }

    protected function configure()
    {
        $this->setDescription('Shows student grades');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $studentGrades = $this->testResultProcessor->studentGrades();

        $table = new Table($output);
        $table->setHeaders(['Student', 'Grade', 'Status']);

        $index = 0;
        foreach ($studentGrades as $studentId => $studentGrade) {
            $table->setRow($index, [$studentId, $studentGrade, $this->determineStatusText($studentGrade)]);
            $index++;
        }
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
