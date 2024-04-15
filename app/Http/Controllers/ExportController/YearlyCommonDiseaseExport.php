<?php

namespace App\Http\Controllers\ExportController;


use App\Models\AnimalDeath;
use App\Models\YearlyCommonDisease;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

class YearlyCommonDiseaseExport extends Controller
{
    public function generateExcel()
    {
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Republic of the Philippines
        $sheet->setCellValue('A1', 'Republic of the Philippines');
        $sheet->getStyle('A1')->getFont();
        $sheet->getStyle('A1')->getFont()->setSize(12);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Province of Benguet
        $sheet->setCellValue('A2', 'PROVINCE OF BENGUET');
        $sheet->getStyle('A2')->getFont();
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Soci0-Economic Profile
        $sheet->setCellValue('A3', 'SOCIO-ECONOMIC PROFILE');
        $sheet->getStyle('A3')->getFont()->setBold(true);
        $sheet->getStyle('A3')->getFont()->setSize(14);
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Add space between header lines
        $sheet->setCellValue('A4', ''); // Empty cell for space
        $sheet->getRowDimension(4)->setRowHeight(10); // Adjust row height for space


        $sheet->setCellValue('A5', 'Yearly Common Disease Count');
        $sheet->getStyle('A5')->getFont()->setBold(true);
        $sheet->getStyle('A5')->getFont()->setSize(12);
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A6', 'Sorted from Recent Year to Oldest');
        $sheet->getStyle('A6')->getFont();
        $sheet->getStyle('A6')->getFont()->setSize(12);
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Merge cells for title and subtitle
        $sheet->mergeCells('A1:C1'); // Republic of the Philippines
        $sheet->mergeCells('A2:C2'); // Province of Benguet
        $sheet->mergeCells('A3:C3'); // Socio-Economic Profile
        $sheet->mergeCells('A5:C5'); // Animal Population Count
        $sheet->mergeCells('A6:C6'); // For the Year

        // Center the header cells horizontally and vertically
        $headerCells = ['A1:F6'];
        foreach ($headerCells as $cellRange) {
            $sheet->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        }

        // Add image to the spreadsheet
        $imagePath = public_path('assets/images/benguet.png'); // Change this to the path of your image file
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Benguet Logo');
        $drawing->setPath($imagePath);
        $drawing->setWidthAndHeight(75, 75);
        $drawing->setCoordinates('A1'); // Set the cell where the image will start
        $drawing->setOffsetX(40); // Reset X offset to align with the left of the cell
        $drawing->setOffsetY(100); // Reset Y offset to align with the top of the cell
        $drawing->setWorksheet($sheet);

        // Add image to the spreadsheet
        $imagePath = public_path('assets/images/bagong-pilipinas.png'); // Change this to the path of your image file
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Bagong Pilipinas Logo');
        $drawing->setPath($imagePath);
        $drawing->setWidthAndHeight(100, 100);
        $drawing->setCoordinates('C1'); // Set the cell where the image will start
        $drawing->setOffsetX(50); // Reset X offset to align with the left of the cell
        $drawing->setOffsetY(10); // Reset Y offset to align with the top of the cell
        $drawing->setWorksheet($sheet);

        // Retrieve data from the AnimalPopulation model
        $data = YearlyCommonDisease::orderBy('year', 'desc')->get();


        // Add headers to the spreadsheet
        $sheet->setCellValue('A7', 'Disease');
        $sheet->setCellValue('B7', 'Year');
        $sheet->setCellValue('C7', 'Animal Death Count');


        $headerStyle = $sheet->getStyle('A7:C7');
        $headerFont = $headerStyle->getFont();
        $headerFont->setBold(true);

        // Add data to the spreadsheet
        $row = 8;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->disease->disease_name);
            $sheet->setCellValue('B' . $row, $item->year);
            $sheet->setCellValue('C' . $row, $item->disease_count);

            $row++;
        }

        // Center the data cells horizontally and vertically
        $sheet->getStyle('A7:C' . ($row - 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A7:C' . ($row - 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Adjust page setup for better display
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // Set column width to auto
        foreach (range('A', 'C') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Create a temporary file path
        $tempFilePath = tempnam(sys_get_temp_dir(), 'animal_death_');
        // Save the Excel file to the temporary path
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFilePath);

        // Download the Excel file
        $fileName = 'benguet_yearly_common_disease.xlsx';
        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }
}
