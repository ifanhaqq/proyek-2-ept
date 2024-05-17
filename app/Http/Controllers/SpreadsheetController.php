<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
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
            return $foundCellRow - 1;
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

    public function choiceConverter($arrayWorksheet)
    {
        switch ($arrayWorksheet) {
            case "A":
                $arrayWorksheet = "1";
                break;
            case "B":
                $arrayWorksheet = "2";
                break;
            case "C":
                $arrayWorksheet = "3";
                break;
            case "D":
                $arrayWorksheet = "4";
                break;
        }

        $choice = 'choice_';
        $correctAnswer = $choice . $arrayWorksheet;


        return $correctAnswer;
    }

    public function importSpreadsheet(Request $request, $wave_id)
    {
        $file = $request->file('excel');

        $worksheet = IOFactory::load($file)->getActiveSheet();

        $arrayWorksheet = $worksheet->toArray();

        // dd($arrayWorksheet);

        // Search row of cell that contain value of Reading
        $firstReadingIndex = $this->searchCell($worksheet, "Reading");

        // Find cells containing reading text
        // $readingTextsRow = $this->searchReadingTextCell($worksheet, 200);

        for ($i = 1; $i < $firstReadingIndex; $i++) {
            $correctAnswerString = $this->choiceConverter($arrayWorksheet[$i][6]);

            $section = $arrayWorksheet[$i][0];
            $question = $arrayWorksheet[$i][1];
            $choice_1 = $arrayWorksheet[$i][2];
            $choice_2 = $arrayWorksheet[$i][3];
            $choice_3 = $arrayWorksheet[$i][4];
            $choice_4 = $arrayWorksheet[$i][5];
            $correct_answer = $$correctAnswerString;

            $testQuestion = new TestQuestion;

            $testQuestion->wave_id = $wave_id;
            $testQuestion->section = $section;
            $testQuestion->question = $question;
            $testQuestion->question_ch1 = $choice_1;
            $testQuestion->question_ch2 = $choice_2;
            $testQuestion->question_ch3 = $choice_3;
            $testQuestion->question_ch4 = $choice_4;
            $testQuestion->correct_answer = $correct_answer;

            $testQuestion->save();
        }


    }
}
