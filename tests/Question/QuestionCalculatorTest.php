<?php

namespace App\Tests\Question;

use App\Question\QuestionCalculator;
use PHPUnit\Framework\TestCase;

class QuestionCalculatorTest extends TestCase
{

    /**
     * @dataProvider pValueProvider
     */
    public function testPValue(float $expected, array $studentGrades, int $maxScore): void
    {
        $questionCalculator = new QuestionCalculator();
        $this->assertEquals($expected, $questionCalculator->pValue($maxScore, ...$studentGrades));
    }

    public function pValueProvider(): array
    {
        return [
            [0.1, [1, 1, 1], 10],
            [0.5, [5, 0, 10], 10],
            [0.5, [10, 0, 20], 20],
        ];
    }
}
