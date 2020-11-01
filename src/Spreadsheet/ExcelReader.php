<?php declare(strict_types=1);

namespace App\Spreadsheet;

use App\Grade\SpreadSheetData;

class ExcelReader
{
    public function getSpreadData(): SpreadSheetData
    {
        return new SpreadSheetData();
    }
}
