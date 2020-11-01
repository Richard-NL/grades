<?php declare(strict_types=1);

namespace App\Grades;

class GradeCalculator
{
    private const INCREMENT_GRADE_WHEN_FAILED = 0.09;
    private const INCREMENT_GRADE_WHEN_PASSED = 0.15;

    private const GRADE_LOWEST = 1.0;
    private const GRADE_PASSED = 5.5;

    private const BOUNDARY_LOWEST_GRADE_PERCENTAGE = 20;
    private const BOUNDARY_PASSED_GRADE_PERCENTAGE = 70;

    public function calculatePercentage(int $maxScore, int $score): float
    {
        return (float) $score / ($maxScore / 100);
    }

    public function calculateGrade(float $percentageCorrect): float
    {

        if ($percentageCorrect < self::BOUNDARY_LOWEST_GRADE_PERCENTAGE) {
            return self::GRADE_LOWEST;
        }

        if ($percentageCorrect >= self::BOUNDARY_LOWEST_GRADE_PERCENTAGE
            && $percentageCorrect < self::BOUNDARY_PASSED_GRADE_PERCENTAGE) {

            return $this->gradeFormula(
                self::GRADE_LOWEST,
                $percentageCorrect,
                self::BOUNDARY_LOWEST_GRADE_PERCENTAGE,
                self::INCREMENT_GRADE_WHEN_FAILED
            );
        }

        return $this->gradeFormula(
            self::GRADE_PASSED,
            $percentageCorrect,
            self::BOUNDARY_PASSED_GRADE_PERCENTAGE,
            self::INCREMENT_GRADE_WHEN_PASSED
        );
    }


    private function gradeFormula(
        float $gradeBoundary,
        float $percentageCorrect,
        int $boundaryGradePercentage,
        float $gradeIncrement
    ): float {
        return round($gradeBoundary
               + ($percentageCorrect - $boundaryGradePercentage) * $gradeIncrement, 1);
    }
}
