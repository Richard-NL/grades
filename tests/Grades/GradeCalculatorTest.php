<?php

namespace App\Tests\Grades;

use App\Grades\GradeCalculator;
use PHPUnit\Framework\TestCase;

class GradeCalculatorTest extends TestCase
{
    /**
     * @dataProvider calculatePercentageProvider
     */
    public function testCalculatePercentage(float $expected, int $maxScore, int $score): void
    {
        $gradeCalculator = new GradeCalculator();
        $this->assertSame($expected, round($gradeCalculator->calculatePercentage($maxScore, $score), 1));
    }

    public function calculatePercentageProvider(): array
    {
        return [
            [50, 100, 50],
            [90, 100, 90],
            [25, 200, 50],
            [1, 400, 4],
            [33.3, 90, 30],
        ];
    }
}
