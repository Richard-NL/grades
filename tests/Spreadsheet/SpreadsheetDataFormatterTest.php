<?php

namespace App\Tests\Spreadsheet;

use App\Spreadsheet\SpreadsheetDataFormatter;
use PHPUnit\Framework\TestCase;

class SpreadsheetDataFormatterTest extends TestCase
{
    /**
     * @dataProvider questionScoresPerStudentProvider
     */
    public function testQuestionScoresPerStudent(array $expected, array $studentScores): void
    {
        $formatter = new SpreadsheetDataFormatter();
        $this->assertEquals($expected, $formatter->questionScoresPerStudent($studentScores));
    }

    public function questionScoresPerStudentProvider(): array
    {
        return [
            [
                [
                    'q1' => ['s1' => 1, 's2' => 2],
                    'q2' => ['s1' => 2, 's2' => 1],
                ],
                [
                    's1' => ['q1' => 1, 'q2' => 2],
                    's2' => ['q1' => 2, 'q2' => 1],
                ],
            ],
            [
                [
                    'Question 1' => ['Student 1' => 9],
                ],
                [
                    'Student 1' => ['Question 1' => 9],
                ],
            ],
        ];
    }
}
