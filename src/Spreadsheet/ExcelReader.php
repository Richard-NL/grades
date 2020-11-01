<?php declare(strict_types=1);

namespace App\Spreadsheet;

use App\Grade\SpreadsheetData;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelReader
{
    private string $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function getSpreadSheetData(): SpreadsheetData
    {
        $spreadsheet = IOFactory::load($this->filepath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rawData = $worksheet->toArray();

        $questionNames = $this->questionNames($rawData[0]);

        $mappedMaxQuestionScores = $this->mappedMaxQuestionScores($questionNames, $rawData[1]);

        $mappedStudentScores = $this->mappedStudentScores($rawData, $questionNames);

        return new SpreadsheetData(
            array_sum(array_values($mappedMaxQuestionScores)),
            $mappedMaxQuestionScores,
            $mappedStudentScores
        );
    }

    private function mappedMaxQuestionScores(array $questionNames, array $rawData): array
    {
        $maxQuestionScores = $rawData;
        array_shift($maxQuestionScores);

        $mappedMaxQuestionScores = [];
        foreach ($questionNames as $index => $questionName) {
            $mappedMaxQuestionScores[$questionName] = $maxQuestionScores[$index];
        }

        return $mappedMaxQuestionScores;
    }

    private function questionNames(array $rawData): array
    {
        $questionNames = array_map(fn($question) => str_replace('Score ', '', $question), $rawData);
        // remove first entry
        array_shift($questionNames);

        return $questionNames;
    }

    private function mappedStudentScores(array $rawData, array $questionNames): array
    {
        $studentScores = $rawData;
        for ($i = 0; $i < 2; $i++) {
            array_shift($studentScores);
        }
        $mappedStudentScores = [];
        foreach ($studentScores as $studentScore) {
            $studentId = array_shift($studentScore);
            $studentMappedScores = [];
            foreach ($questionNames as $index => $questionName) {
                $studentMappedScores[$questionName] = $studentScore[$index];
            }
            $mappedStudentScores[$studentId] = $studentMappedScores;
        }

        return $mappedStudentScores;
    }
}
