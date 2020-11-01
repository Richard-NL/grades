<?php declare(strict_types=1);

namespace App\Question;

use MathPHP\Statistics\Correlation;

class QuestionCalculator
{
    private Correlation $correlation;

    public function __construct(Correlation $correlation)
    {
        $this->correlation = $correlation;
    }
    
    public function pValue(int $maxScore, float ...$studentGrades): float
    {
        $average = array_sum(array_values($studentGrades)) / count($studentGrades);
        return round($average /$maxScore, 2);
    }

    public function rValue(array $questionScorePerStudent, array $studentGrades): float
    {
        return $this->correlation->r($questionScorePerStudent, $studentGrades);
    }
}
