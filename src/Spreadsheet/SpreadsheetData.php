<?php declare(strict_types=1);

namespace App\Grade;

class SpreadsheetData
{
    public function maxTestScore()
    {
        return 100;
    }

    public function questionMaxScores(): array
    {
        return [
            'Question 1' => 100,
            'Question 2' => 100,
            'Question 3' => 100,
            'Question 4' => 100,
            'Question 5' => 100,
        ];
    }

    public function studentScores(): array
    {
        return [
            'Student 1' => [
                'Question 1' => 0,
                'Question 2' => 0,
                'Question 3' => 0,
                'Question 4' => 0,
                'Question 5' => 0,
            ],
            'Student 2' => [
                'Question 1' => 20,
                'Question 2' => 0,
                'Question 3' => 0,
                'Question 4' => 0,
                'Question 5' => 0,
            ],
            'Student 3' => [
                'Question 1' => 69,
                'Question 2' => 0,
                'Question 3' => 0,
                'Question 4' => 0,
                'Question 5' => 0,
            ],
            'Student 4' => [
                'Question 1' => 20,
                'Question 2' => 20,
                'Question 3' => 20,
                'Question 4' => 10,
                'Question 5' => 0,
            ],
            'Student 5' => [
                'Question 1' => 20,
                'Question 2' => 20,
                'Question 3' => 20,
                'Question 4' => 20,
                'Question 5' => 20,
            ],
        ];
    }
}
