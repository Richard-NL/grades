<?php declare(strict_types=1);

namespace App\Question;

class QuestionCalculator
{
    public function pValue(int $maxScore, float ...$studentGrades): float
    {
        $average = array_sum(array_values($studentGrades)) / count($studentGrades);
        return round($average /$maxScore, 2);
    }
}
