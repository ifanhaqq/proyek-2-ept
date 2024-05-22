<?php

namespace App\Http\Controllers;

use App\Models\ReadingSection;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

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

    public function submitQuestion(
        $wave_id,
        $question,
        $section,
        $reading_id,
        $question_ch1,
        $question_ch2,
        $question_ch3,
        $question_ch4,
        $correct_answer
    ) {

        $testQuestion = new TestQuestion;

        $testQuestion->wave_id = $wave_id;
        $testQuestion->section = $section;
        $testQuestion->reading_id = $reading_id;
        $testQuestion->question = $question;
        $testQuestion->question_ch1 = $question_ch1;
        $testQuestion->question_ch2 = $question_ch2;
        $testQuestion->question_ch3 = $question_ch3;
        $testQuestion->question_ch4 = $question_ch4;
        $testQuestion->correct_answer = $correct_answer;

        $testQuestion->save();
    }

    public function importSpreadsheet(Request $request, $wave_id)
    {
        $file = $request->file('excel');

        $worksheet = IOFactory::load($file)->getActiveSheet();

        $arrayWorksheet = $worksheet->toArray();

        // Search row of cell that contain value of Reading
        $firstReadingIndex = $this->searchCell($worksheet, "Reading");

        // Find cells containing reading text
        $readingTextsCell = $this->searchReadingTextCell($worksheet, 200);
        $readingTexts = [];

        for ($i = 0; $i < count($readingTextsCell); $i++) {
            $readingText = $worksheet->getCell("B$readingTextsCell[$i]")->getValue();
            $readingTexts[] = $readingText;
        }

        // insert the queries
        try {
            // Inserting listening and grammar sections
            for ($i = 1; $i < $firstReadingIndex; $i++) {
                $correctAnswerString = $this->choiceConverter($arrayWorksheet[$i][6]);

                $section = $arrayWorksheet[$i][0];
                $question = $arrayWorksheet[$i][1];
                $choice_1 = $arrayWorksheet[$i][2];
                $choice_2 = $arrayWorksheet[$i][3];
                $choice_3 = $arrayWorksheet[$i][4];
                $choice_4 = $arrayWorksheet[$i][5];
                $correct_answer = $$correctAnswerString;

                $this->submitQuestion($wave_id, $question, $section, null, $choice_1, $choice_2, $choice_3, $choice_4, $correct_answer);
            }

            // Inserting reading section
            for ($i = 0; $i < count($readingTextsCell) - 1; $i++) {
                // echo $readingTexts[$i] . "<br><br>";
                $manualIncrement = ReadingSection::max("reading_id") + 1;

                $readingSection = new ReadingSection;
                $readingSection->reading_id = $manualIncrement;
                $readingSection->text = $readingTexts[$i];
                $readingSection->save();


                for ($j = $readingTextsCell[$i]; $j < $readingTextsCell[$i + 1] - 1; $j++) {
                    $correctAnswerString = $this->choiceConverter($arrayWorksheet[$j][6]);

                    $section = $arrayWorksheet[$j][0];
                    $question = $arrayWorksheet[$j][1];
                    $choice_1 = $arrayWorksheet[$j][2];
                    $choice_2 = $arrayWorksheet[$j][3];
                    $choice_3 = $arrayWorksheet[$j][4];
                    $choice_4 = $arrayWorksheet[$j][5];
                    $correct_answer = $$correctAnswerString;

                    // echo $section . "<br>";
                    $this->submitQuestion($wave_id, $question, $section, $manualIncrement, $choice_1, $choice_2, $choice_3, $choice_4, $correct_answer);
                }
            }

        } catch (\Throwable $th) {
            dd($th);
        }

        return redirect()->route('manage-wave', $wave_id)->with('success', 'Questions imported sucessfully');
    }
}
