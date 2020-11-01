<?php declare(strict_types=1);

namespace App\Question;

class QuestionStatisticProcessor
{
    public function questionStatistics(): array
    {
        return [
            'Question 1' => ['p' => 1, 'r' => 1],
            'Question 2' => ['p' => 0, 'r' => 0],
            'Question 3' => ['p' => 0.1,'r' => -1],
            'Question 4' => ['p' => 0.5,'r' => 0.55],
        ];
    }
}
