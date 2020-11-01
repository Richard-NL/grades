<?php declare(strict_types=1);

namespace App\Spreadsheet;

class SpreadsheetDataFormatter
{
    public function questionScoresPerStudent(array $studentScores): array
    {
        $questionScoresPerStudent = [];
        foreach ($studentScores as $studentId => $studentScorePerQuestion) {
            foreach ($studentScorePerQuestion as $questionName => $questionScore) {
                if (array_key_exists($questionName, $questionScoresPerStudent)) {
                    $questionScoresPerStudent[$questionName][$studentId] = $questionScore;
                } else {
                    $questionScoresPerStudent[$questionName] = [$studentId => $questionScore];
                }
            }
        }

        return $questionScoresPerStudent;
    }
}
