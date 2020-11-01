<?php declare(strict_types=1);

namespace App\Grade;

use App\Spreadsheet\ExcelReader;

class GradeResultProcessor
{
    private GradeCalculator $gradeCalculator;

    private ExcelReader $excelReader;

    public function __construct(GradeCalculator $gradeCalculator, ExcelReader $excelReader)
    {
        $this->gradeCalculator = $gradeCalculator;
        $this->excelReader = $excelReader;
    }

    public function studentGrades(): array
    {
        $sheetData = $this->excelReader->getSpreadSheetData();
        $grades = [];

        foreach ($sheetData->studentScores() as $studentId => $studentScores) {

            $percentage = $this->gradeCalculator->calculatePercentage(
                $sheetData->maxTestScore(),
                array_sum($studentScores)
            );

            $grades[$studentId] = $this->gradeCalculator->calculateGrade($percentage);
        }
        return $grades;
    }
}
