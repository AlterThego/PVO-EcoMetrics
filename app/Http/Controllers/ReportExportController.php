<?php

namespace App\Http\Controllers;

use App\Models\AffectedAnimals;
use App\Models\Animal;
use App\Models\AnimalDeath;
use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use App\Models\Barangay;
use App\Models\BeeKeeper;
use App\Models\Disease;
use App\Models\Farm;
use App\Models\FarmSupply;
use App\Models\FishProduction;
use App\Models\FishProductionArea;
use App\Models\FishSanctuary;
use App\Models\Municipality;
use App\Models\Population;
use App\Models\VeterinaryClinics;
use App\Models\YearlyCommonDisease;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Converter;

class ReportExportController extends Controller
{
    public function exportData(Request $request)
    {
        // Get the selected year from the request or session
        $selectedYear = $request->input('year', session('selectedYear'));

        // If no year is selected, default to the latest year
        if (!$selectedYear) {
            $selectedYear = AnimalPopulation::max('year');
        }

        // Retrieve filtered data from models
        $animalPopulations = AnimalPopulation::where('year', $selectedYear)->get();
        $affectedAnimals = AffectedAnimals::where('year', $selectedYear)->get();
        $animalDeaths = AnimalDeath::where('year', $selectedYear)->get();

        $fishProductionAreas = FishProductionArea::all();
        $fishSanctuaries = FishSanctuary::all();

        $yearlyDiseases = YearlyCommonDisease::where('year', $selectedYear)->get();
        $veterinaryClinics = VeterinaryClinics::all();

        $farms = Farm::all();
        $farmSupplies = FarmSupply::all();
        $beeKeepings = BeeKeeper::all();

        // Miscellaneous
        $animals = Animal::all();
        $animalTypes = AnimalType::all();
        $fishProductionTypes = FishProduction::all();
        $animalDiseases = Disease::all();
        $municipalities = Municipality::all();
        $barangays = Barangay::all();
        $populations = Population::where('census_year', $selectedYear)->get();



        // Instantiate PHPWord
        $phpWord = new PhpWord();
        $phpWord->getCompatibility()->setOoxmlVersion(15);

        // Add content to document
        $section = $phpWord->addSection([
            'marginLeft' => Converter::inchToTwip(1),   // Left margin in inches
            'marginRight' => Converter::inchToTwip(1),   // Right margin in inches
            'marginTop' => Converter::inchToTwip(1),   // Top margin in inches
            'marginBottom' => Converter::inchToTwip(1),
            'pageSizeH' => Converter::inchToTwip(14),
            'pageSizeW' => Converter::inchToTwip(8.5)
        ]);

        // Add header
        $this->addHeader($section, $selectedYear);

        // Add data table
        // Animal
        $this->animalPopulationExport($section, $animalPopulations);
        $this->affectedAnimalsExport($section, $affectedAnimals);
        $this->animalDeathExport($section, $animalDeaths);

        // Fish
        $this->fishProductionAreaExport($section, $fishProductionAreas);
        $this->fishSanctuaryExport($section, $fishSanctuaries);

        // Health
        $this->yearlyDiseasesExport($section, $yearlyDiseases);
        $this->veterinaryClinicExport($section, $veterinaryClinics);

        // Farm
        $this->farmExport($section, $farms);
        $this->farmSupplyExport($section, $farmSupplies);
        $this->beeKeepingExport($section, $beeKeepings);

        // Miscellaneous
        $this->animalListExport($section, $animals);
        $this->animalTypeExport($section, $animalTypes);
        $this->animalTypeExport($section, $fishProductionTypes);
        $this->fishProductionTypesExport($section, $fishProductionTypes);
        $this->animalDiseasesExport($section, $animalDiseases);
        $this->municipalitiesExport($section, $municipalities);
        $this->barangaysExport($section, $barangays);
        $this->populationExport($section, $populations);


        // Save or stream the document
        $filename = 'Socio-Economic Profile of Benguet for the Year ' . $selectedYear . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path($filename));

        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }

    private function addHeader($section, $selectedYear)
    {
        $header = $section->addHeader();
        // $header->firstPage();

        $imageStyle = [
            'width' => 50,
            'height' => 50,
            'wrappingStyle' => 'square',
            'positioning' => 'absolute',
            'posHorizontalRel' => 'margin',
            'posVerticalRel' => 'line',
        ];

        $table = $header->addTable([
            'alignment' => 'center', // Center align the entire table
            'width' => Converter::inchToTwip(8.5)
        ]);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addImage(public_path('assets/images/logo.png'), $imageStyle);
        $space = "   ";

        $cell2 = $table->addCell();
        $cell2->addText("$space Republic of the Philippines $space", null, array('align' => 'center'));
        $cell2->addText("$space PROVINCE OF BENGUET $space", null, array('align' => 'center'));
        $cell2->addText("$space SOCIO-ECONOMIC PROFILE $space", ['bold' => true], array('align' => 'center'));
        $cell2->addText("$space Year $selectedYear $space", null, array('align' => 'center'));

        $cell3 = $table->addCell();
        $cell3->addImage(public_path('assets/images/bagong-pilipinas.png'), ['width' => 55, 'height' => 55, 'alignment' => 'right']);
    }

    private function animalPopulationExport($section, $animalPopulations)
    {
        $section->addText('Animal Population', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(1000, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(3000, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3000, $tableStyle)->addText('Animal', ['bold' => true], $alignCenter);
        $table->addCell(3000, $tableStyle)->addText('Animal Type', ['bold' => true], $alignCenter);
        $table->addCell(1500, $tableStyle)->addText('Population Count', ['bold' => true], $alignCenter);
        $table->addCell(1500, $tableStyle)->addText('Volume', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($animalPopulations as $animalPopulation) {
            $table->addRow();
            $table->addCell(1000)->addText($animalPopulation->year, null, $alignCenter);
            $table->addCell(3000)->addText($animalPopulation->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3000)->addText($animalPopulation->animal->animal_name, null, $alignCenter);
            $table->addCell(3000)->addText($animalPopulation->animal_type->type, null, $alignCenter);
            $table->addCell(1500)->addText($animalPopulation->animal_population_count, null, $alignCenter);
            $table->addCell(1500)->addText($animalPopulation->volume, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function affectedAnimalsExport($section, $affectedAnimals)
    {
        $section->addText('Affected Animals', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(3250, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Animal', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Count', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($affectedAnimals as $affectedAnimal) {
            $table->addRow();
            $table->addCell(3250)->addText($affectedAnimal->year, null, $alignCenter);
            $table->addCell(3250)->addText($affectedAnimal->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3250)->addText($affectedAnimal->animal->animal_name, null, $alignCenter);
            $table->addCell(3250)->addText($affectedAnimal->count, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function animalDeathExport($section, $animalDeaths)
    {
        $section->addText('Animal Deaths', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(3250, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Animal', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Count', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($animalDeaths as $animalDeath) {
            $table->addRow();
            $table->addCell(3250)->addText($animalDeath->year, null, $alignCenter);
            $table->addCell(3250)->addText($animalDeath->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3250)->addText($animalDeath->animal->animal_name, null, $alignCenter);
            $table->addCell(3250)->addText($animalDeath->count, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function fishProductionAreaExport($section, $fishProductionAreas)
    {
        $section->addText('Fish Production Areas', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(3250, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Animal', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Count', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($fishProductionAreas as $fishProductionArea) {
            $table->addRow();
            $table->addCell(3250)->addText($fishProductionArea->year, null, $alignCenter);
            $table->addCell(3250)->addText($fishProductionArea->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3250)->addText($fishProductionArea->fish_production->type, null, $alignCenter);
            $table->addCell(3250)->addText($fishProductionArea->land_area, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function fishSanctuaryExport($section, $fishSanctuaries)
    {
        $section->addText('Fish Sanctuaries', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(4333, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Barangay Name', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Land Area', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($fishSanctuaries as $fishSanctuaries) {
            $table->addRow();
            $table->addCell(4333)->addText($fishSanctuaries->year, null, $alignCenter);
            $table->addCell(4333)->addText($fishSanctuaries->barangay->barangay_name, null, $alignCenter);
            $table->addCell(4333)->addText($fishSanctuaries->land_area, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function yearlyDiseasesExport($section, $yearlyDiseases)
    {
        $section->addText('Yearly Diseases', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(4333, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Disease', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Disease Count', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($yearlyDiseases as $yearlyDisease) {
            $table->addRow();
            $table->addCell(4333)->addText($yearlyDisease->year, null, $alignCenter);
            $table->addCell(4333)->addText($yearlyDisease->disease->disease_name, null, $alignCenter);
            $table->addCell(4333)->addText($yearlyDisease->disease_count, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function veterinaryClinicExport($section, $veterinaryClinics)
    {
        $section->addText('Veterinary Clinics', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(2600, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(2600, $tableStyle)->addText('Sector', ['bold' => true], $alignCenter);
        $table->addCell(2600, $tableStyle)->addText('Clinic Name', ['bold' => true], $alignCenter);
        $table->addCell(2600, $tableStyle)->addText('Year Established', ['bold' => true], $alignCenter);
        $table->addCell(2600, $tableStyle)->addText('Year Closed', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($veterinaryClinics as $veterinaryClinic) {
            $table->addRow();
            $table->addCell(2600)->addText($veterinaryClinic->municipality->municipality_name, null, $alignCenter);
            $table->addCell(2600)->addText($veterinaryClinic->sector, null, $alignCenter);
            $table->addCell(2600)->addText($veterinaryClinic->clinic_name, null, $alignCenter);
            $table->addCell(2600)->addText($veterinaryClinic->year_established, null, $alignCenter);
            $table->addCell(2600)->addText($veterinaryClinic->year_closed, null, $alignCenter);


        }
        $section->addTextBreak();
    }

    private function farmExport($section, $farms)
    {
        $section->addText('Farms', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(1625, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Level', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Farm Name', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Farm Area', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Farm Sector', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Farm Type', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Year Established', ['bold' => true], $alignCenter);
        $table->addCell(1625, $tableStyle)->addText('Year Closed', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($farms as $farm) {
            $table->addRow();
            $table->addCell(1625)->addText($farm->municipality->municipality_name, null, $alignCenter);
            $table->addCell(1625)->addText($farm->level, null, $alignCenter);
            $table->addCell(1625)->addText($farm->farm_name, null, $alignCenter);
            $table->addCell(1625)->addText($farm->farm_area, null, $alignCenter);
            $table->addCell(1625)->addText($farm->farm_sector, null, $alignCenter);
            $table->addCell(1625)->addText($farm->farm_type, null, $alignCenter);
            $table->addCell(1625)->addText($farm->year_established, null, $alignCenter);
            $table->addCell(1625)->addText($farm->year_closed, null, $alignCenter);



        }
        $section->addTextBreak();
    }

    private function farmSupplyExport($section, $farmSupplies)
    {
        $section->addText('Farms Supply', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(3250, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Establishment Name', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Year Established', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Year Closed', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($farmSupplies as $farmSupply) {
            $table->addRow();
            $table->addCell(3250)->addText($farmSupply->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3250)->addText($farmSupply->establishment_name, null, $alignCenter);
            $table->addCell(3250)->addText($farmSupply->year_established, null, $alignCenter);
            $table->addCell(3250)->addText($farmSupply->year_closed, null, $alignCenter);



        }
        $section->addTextBreak();
    }

    private function beeKeepingExport($section, $beeKeepings)
    {
        $section->addText('Bee Keeping', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(3250, $tableStyle)->addText('Year', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Colonies', ['bold' => true], $alignCenter);
        $table->addCell(3250, $tableStyle)->addText('Bee Keepers', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($beeKeepings as $beeKeeping) {
            $table->addRow();
            $table->addCell(3250)->addText($beeKeeping->year, null, $alignCenter);
            $table->addCell(3250)->addText($beeKeeping->municipality->municipality_name, null, $alignCenter);
            $table->addCell(3250)->addText($beeKeeping->colonies, null, $alignCenter);
            $table->addCell(3250)->addText($beeKeeping->bee_keepers, null, $alignCenter);



        }
        $section->addTextBreak();
    }


    private function animalListExport($section, $animals)
    {
        $section->addText('Animal List', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(6500, $tableStyle)->addText('Animal', ['bold' => true], $alignCenter);
        $table->addCell(6500, $tableStyle)->addText('Classification', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($animals as $animal) {
            $table->addRow();
            $table->addCell(6500)->addText($animal->animal_name, null, $alignCenter);
            $table->addCell(6500)->addText($animal->classification, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function animalTypeExport($section, $animalTypes)
    {
        $section->addText('Animal Types', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(13000, $tableStyle)->addText('Animal Type', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($animalTypes as $animalType) {
            $table->addRow();
            $table->addCell(13000)->addText($animalType->type, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function fishProductionTypesExport($section, $fishProductionTypes)
    {
        $section->addText('Fish Production Types', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(13000, $tableStyle)->addText('Fish Production Type', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($fishProductionTypes as $fishProductionType) {
            $table->addRow();
            $table->addCell(13000)->addText($fishProductionType->type, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function animalDiseasesExport($section, $animalDiseases)
    {
        $section->addText('Animal Diseases', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(13000, $tableStyle)->addText('Fish Prodiction Type', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($animalDiseases as $animalDisease) {
            $table->addRow();
            $table->addCell(13000)->addText($animalDisease->disease_name, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function municipalitiesExport($section, $municipalities)
    {
        $section->addText('Municipalities', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(4333, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Zip Code', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Land Area', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($municipalities as $municipalities) {
            $table->addRow();
            $table->addCell(4333)->addText($municipalities->municipality_name, null, $alignCenter);
            $table->addCell(4333)->addText($municipalities->zip_code, null, $alignCenter);
            $table->addCell(4333)->addText($municipalities->land_area, null, $alignCenter);
        }
        $section->addTextBreak();
    }

    private function barangaysExport($section, $barangays)
    {
        $section->addText('Barangays', ['bold' => true]);
        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(6500, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(6500, $tableStyle)->addText('Barangay Name', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($barangays as $barangay) {
            $table->addRow();
            $table->addCell(6500)->addText($barangay->municipality->municipality_name, null, $alignCenter);
            $table->addCell(6500)->addText($barangay->barangay_name, null, $alignCenter);

        }
        $section->addTextBreak();
    }

    private function populationExport($section, $populations)
    {
        $section->addText('Population per Municipality (Human)', ['bold' => true]);

        // Add table with style
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);
        $tableStyle = ['borderColor' => '000000', 'borderSize' => 6];
        $alignCenter = array('align' => 'center');

        // Add table header row
        $table->addRow();
        $table->addCell(4333, $tableStyle)->addText('Census Year', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Municipality', ['bold' => true], $alignCenter);
        $table->addCell(4333, $tableStyle)->addText('Population', ['bold' => true], $alignCenter);

        // Add table rows with filtered data
        foreach ($populations as $population) {
            $table->addRow();
            $table->addCell(4333)->addText($population->census_year, null, $alignCenter);
            $table->addCell(4333)->addText($population->municipality->municipality_name, null, $alignCenter);
            $table->addCell(4333)->addText($population->population_count, null, $alignCenter);
        }
        $section->addTextBreak();
    }
}
