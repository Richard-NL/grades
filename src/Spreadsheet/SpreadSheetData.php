<?php declare(strict_types=1);

namespace App\Grades;

class SpreadSheetData
{
    public function maxTestScore()
    {
        return 100;
    }

    public function studentScores(): array
    {
        return [
            'Student 1' => [0, 0, 0, 0, 0],
            'Student 2' => [20, 0, 0, 0, 0],
            'Student 3' => [69, 0, 0, 0, 0],
            'Student 4' => [20, 20, 20, 10, 0],
            'Student 5' => [20, 20, 20, 20, 20],
        ];
    }
}
