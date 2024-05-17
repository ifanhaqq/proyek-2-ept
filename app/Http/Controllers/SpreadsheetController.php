<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpreadsheetController extends Controller
{
    public function index()
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save(asset('storage/spreadsheet/helloworld.xlsx'));
    }

    public function downloadTemplate()
    {
        $templateFile = storage_path('app/public/excel/template-import.xlsx');

        if (file_exists($templateFile))
            return response()->download($templateFile);
        else
            return response()->json(['error' => 'File not found.'], 404);
    }

    public function searchCell($worksheet, $searchValue)
    {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        $foundCellRow = null;

        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                // Get the cell value
                $cellValue = $worksheet->getCell($col . $row)->getValue();

                // Check if the cell value matches the search value
                if ($cellValue == $searchValue) {
                    // Cell with matching value found
                    $foundCellRow = $row;
                    // Break out of the loop since we found the cell
                    break 2;
                }
            }
        }

        if ($foundCellRow !== null) {
            return $foundCellRow;
        } else {
            echo "Cell not found";
        }
    }

    public function searchReadingTextCell($worksheet, $targetHeight)
    {

        $readingTexts = [];

        $readingTextsRow = [];

        // Find cells containing reading text
        foreach ($worksheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            $rowDimension = $worksheet->getRowDimension($rowIndex);

            // Check if the row height matches the target height
            if ($rowDimension->getRowHeight() >= $targetHeight) {
                // Iterate through cells in the row
                foreach ($worksheet->getColumnIterator() as $column) {
                    $columnIndex = $column->getColumnIndex();
                    $cell = $worksheet->getCell($columnIndex . $rowIndex);
                    if (strlen($cell->getValue()) > 20) {
                        $readingTexts[] = $cell->getCoordinate();
                    }
                }
            }
        }

        foreach ($readingTexts as $readingText) {
            $separate = explode("B", $readingText);
            $readingTextsRow[] = $separate[1];
        }

        return $readingTextsRow;
    }

    public function importSpreadsheet(Request $request)
    {
        $file = $request->file('excel');

        $worksheet = IOFactory::load($file)->getActiveSheet();

        $arrayWorksheet = $worksheet->toArray();

        // dd($arrayWorksheet);

        // Search row of cell that contain value of Reading
        $firstReadingIndex = $this->searchCell($worksheet, "Reading");

        // Find cells containing reading text
        $readingTextsRow = $this->searchReadingTextCell($worksheet, 200);

        dd($readingTextsRow);


    }
}
