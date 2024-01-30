<?php

namespace App\Livewire;

use App\Models\AnimalDeath;
use App\Models\Municipality;
use App\Models\Animal;
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

final class AnimalDeathTable extends PowerGridComponent
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
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return AnimalDeath::query()
            ->join('municipalities', 'animal_deaths.municipality_id', '=', 'municipalities.id')
            ->join('animal', 'animal_deaths.animal_id', '=', 'animal.id')
            ->select(
                'animal_deaths.*',
                'animal.animal_name as animal_id',
                'municipalities.municipality_name as municipality_id',
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
            ->addColumn('year')
            ->addColumn('municipality_id')
            ->addColumn('animal_id')
            ->addColumn('count')
            ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),

            Column::make('Municipality id', 'municipality_id'),
            Column::make('Animal id', 'animal_id'),

            Column::make('Count', 'count')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

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

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(AnimalDeath $row): array
    {
        return [
            Button::add('delete-row')
                ->slot('- Delete')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['animalDeathId' => $row->id])
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
}
