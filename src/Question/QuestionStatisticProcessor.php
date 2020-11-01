<?php declare(strict_types=1);

namespace App\Question;

use App\Grade\GradeResultProcessor;
use App\Spreadsheet\ExcelReader;
use App\Spreadsheet\SpreadsheetDataFormatter;

class QuestionStatisticProcessor
{

    private ExcelReader $excelReader;

    private QuestionCalculator $questionCalculator;

    private SpreadsheetDataFormatter $spreadsheetDataFormatter;

    private GradeResultProcessor $gradeResultProcessor;

    public function __construct(
        ExcelReader $excelReader,
        QuestionCalculator $questionCalculator,
        SpreadsheetDataFormatter $spreadsheetDataFormatter,
        GradeResultProcessor $gradeResultProcessor
    ) {
        $this->excelReader = $excelReader;
        $this->questionCalculator = $questionCalculator;
        $this->spreadsheetDataFormatter = $spreadsheetDataFormatter;
        $this->gradeResultProcessor = $gradeResultProcessor;
    }

    public function questionStatistics(): array
    {
        $spreadSheetData = $this->excelReader->getSpreadSheetData();
        $studentScores = $spreadSheetData->studentScores();
        $questionScoresPerStudent = $this->spreadsheetDataFormatter->questionScoresPerStudent($studentScores);
        $studentGrades = $this->gradeResultProcessor->studentGrades();

        $questionStatistics = [];
        foreach ($spreadSheetData->questionMaxScores() as $questionName => $questionMaxScore) {

            $pValue = $this->questionCalculator->pValue(
                $questionMaxScore,
                ...array_values($questionScoresPerStudent[$questionName])
            );

            $rValue = $this->questionCalculator->rValue(
                array_values($questionScoresPerStudent[$questionName]),
                array_values($studentGrades)
            );

            $questionStatistics[$questionName] = ['p' => $pValue, 'r' => $rValue];
        }

        return $questionStatistics;

    }
}
