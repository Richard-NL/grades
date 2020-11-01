<?php declare(strict_types=1);

namespace App\Grade;

class SpreadsheetData
{
    private int $maxTestScore;

    private array $questionMaxScores;

    private array $studentScores;

    public function __construct(int $maxTestScore, array $questionMaxScores, array $studentScores)
    {
        $this->maxTestScore = $maxTestScore;
        $this->questionMaxScores = $questionMaxScores;
        $this->studentScores = $studentScores;
    }

    public function maxTestScore()
    {
        return $this->maxTestScore;
    }

    public function questionMaxScores(): array
    {
        return $this->questionMaxScores;
    }

    public function studentScores(): array
    {
        return $this->studentScores;
    }
}
