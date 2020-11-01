<?php declare(strict_types=1);

namespace App\Grades;

class GradeCalculator
{
    public function calculatePercentage(int $maxScore, int $score): float
    {
        return (float) $score / ($maxScore / 100);
    }

    public function calculateGrade(float $percentageCorrect): float
    {
        if ($percentageCorrect <= 20) {
            return 1.0;
        }

        if ($percentageCorrect <= 70) {
            return 5.5;
        }
        return 10;
    }
}
