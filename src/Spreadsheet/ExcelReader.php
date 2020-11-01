<?php declare(strict_types=1);

namespace App\Spreadsheet;

use App\Grades\SpreadSheetData;

class ExcelReader
{
    public function getSpreadData(): SpreadSheetData
    {
        return new SpreadSheetData();
    }
}
