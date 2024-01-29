<?php

namespace App\Livewire;

use App\Models\AnimalPopulation;
use App\Models\Municipality;
use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class AnimalPopulationTable extends PowerGridComponent
{
    use WithExport;
    public bool $showFilters = true;
    public string $sortDirection = 'desc';
    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->withoutLoading()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }


    public function datasource(): Builder
    {
        return AnimalPopulation::query()
            ->join('municipalities', 'animal_population.municipality_id', '=', 'municipalities.id')
            ->join('animal', 'animal_population.animal_id', '=', 'animal.id')
            // ->join('animal_type', 'animal_population.animal_type_id', '=', 'animal_type.id')
            ->select(
                'animal_population.*',
                'animal.animal_name as animal_id',
                'municipalities.municipality_name as municipality_id',
                // 'animal_type.type as animal_type_id',
            );

    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('municipality_id')
            ->addColumn('animal_id')
            ->addColumn('animal_type_id')
            ->addColumn('year')
            ->addColumn('animal_population_count')
            ->addColumn('volume');
        // ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),
            Column::make('Municipality', 'municipality_id'),
            Column::make('Animal', 'animal_id'),
            Column::make('Type', 'animal_type_id'),
            Column::make('Population', 'animal_population_count')
                ->sortable()
                ->editOnClick(true)
                ->searchable(),


            Column::make('Volume', 'volume')
                ->sortable()
                ->searchable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('year')
                ->operators(['contains']),


            Filter::select('municipality_id', 'municipality_id')
                ->dataSource(Municipality::all())
                ->optionLabel('municipality_name')
                ->optionValue('id'),

            Filter::select('animal_id', 'animal_id')
                ->dataSource(Animal::all())
                ->optionLabel('animal_name')
                ->optionValue('id'),

            // If enum is used
            // Filter::select('animal_type_id', 'animal_type_id')
            //     ->dataSource(AnimalType::all())
            //     ->optionLabel('type')
            //     ->optionValue('id'),



        ];
    }

    #[\Livewire\Attributes\On('destroy')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(AnimalPopulation $row): array
    {
        return [
            Button::add('delete-row')
                ->slot('Delete')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['animalPopulationId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        // $this->validate();

        AnimalPopulation::query()->find($id)->update([
            $field => $value,
        ]);
    }


}
