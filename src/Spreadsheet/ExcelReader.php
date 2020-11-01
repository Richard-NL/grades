<?php declare(strict_types=1);

namespace App\Spreadsheet;

use App\Grade\SpreadsheetData;

class ExcelReader
{
    public function getSpreadSheetData(): SpreadsheetData
    {
        return new SpreadsheetData();
    }
}
