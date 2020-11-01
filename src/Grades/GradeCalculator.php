<?php declare(strict_types=1);

namespace App\Grades;

class GradeCalculator
{
    private const GRADE_INCREMENT_1 = 0.09;
    private const GRADE_INCREMENT_2 = 0.15
    ;
    public function calculatePercentage(int $maxScore, int $score): float
    {
        return (float) $score / ($maxScore / 100);
    }

    public function calculateGrade(float $percentageCorrect): float
    {
        if ($percentageCorrect < 20) {
            return 1.0;
        }

        if ($percentageCorrect >= 20 && $percentageCorrect < 70) {
            return 1.0 + ($percentageCorrect - 20) * self::GRADE_INCREMENT_1;
        }

        return 5.5 + ($percentageCorrect - 70) * self::GRADE_INCREMENT_2;
    }
}
