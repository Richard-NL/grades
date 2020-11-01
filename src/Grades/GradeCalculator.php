<?php declare(strict_types=1);

namespace App\Grades;

class GradeCalculator
{
    public function calculatePercentage(int $maxScore, int $score): float
    {
        return (float) $score / ($maxScore / 100);
    }
}
