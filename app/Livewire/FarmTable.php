<?php

namespace App\Livewire;

use App\Enums\FarmSector;
use App\Enums\FarmType;
use App\Models\Farm;
use App\Models\Municipality;
use App\Enums\FarmLevel;
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

final class FarmTable extends PowerGridComponent
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
        return Farm::query()
            ->join('municipalities', 'farms.municipality_id', '=', 'municipalities.id')

            ->select(
                'farms.*',
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
            ->addColumn('municipality_id')
            ->addColumn('level')
            ->addColumn('farm_name')
            ->addColumn('farm_area')
            ->addColumn('farm_sector')
            ->addColumn('farm_type')
            ->addColumn('year_established')
            ->addColumn('year_closed')
            ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Municipality id', 'municipality_id'),
            // Column::make('Level', 'level')
            Column::make('Farm Level', 'level', 'farms.level')
                ->sortable()
                ->searchable(),

            Column::make('Farm name', 'farm_name')
                ->sortable()
                ->searchable(),

            Column::make('Farm area', 'farm_area')
                ->sortable()
                ->searchable(),

            Column::make('Farm Sector', 'farm_sector', 'farms.farm_sector')
                ->sortable()
                ->searchable(),

            Column::make('Farm type', 'farm_type')
                ->sortable()
                ->searchable(),

            Column::make('Year established', 'year_established')
                ->sortable()
                ->searchable(),

            Column::make('Year closed', 'year_closed')
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
            Filter::select('municipality_id', 'municipality_id')
                // ->dataSource(Municipality::where('id', 2)->get())
                ->dataSource(Municipality::all())
                ->optionLabel('municipality_name')
                ->optionValue('id'),

            Filter::enumSelect('level', 'farms.level')
                ->dataSource(FarmLevel::cases())
                ->optionLabel('farms.level'),

            Filter::enumSelect('farm_sector', 'farms.farm_sector')
                ->dataSource(FarmSector::cases())
                ->optionLabel('farms.farm_sector'),

            Filter::enumSelect('farm_type', 'farms.farm_type')
                ->dataSource(FarmType::cases())
                ->optionLabel('farms.farm_type'),


        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Farm $row): array
    {
        return [
            Button::add('delete-row')
                ->slot('- Delete')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['farmId' => $row->id])
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
