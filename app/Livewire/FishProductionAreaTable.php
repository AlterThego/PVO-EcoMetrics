<?php

namespace App\Livewire;

use App\Models\FishProductionArea;
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
use Illuminate\Support\Facades\Log;
use App\Models\FishProduction;

final class FishProductionAreaTable extends PowerGridComponent
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
        return FishProductionArea::query()
            ->join('fish_productions', 'fish_production_areas.fish_production_id', '=', 'fish_productions.id')
            ->select(
                'fish_production_areas.*',
                'fish_productions.type as fish_production_id',
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
            ->addColumn('fish_production_id')
            ->addColumn('year')
            ->addColumn('land_area')
            ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),

            Column::make('Fish production type', 'fish_production_id'),


            Column::make('Land area', 'land_area')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

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


            Filter::select('fish_production_id', 'fish_production_id')
                // ->dataSource(Municipality::where('id', 2)->get())
                ->dataSource(FishProduction::all())
                ->optionLabel('type')
                ->optionValue('id'),

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(FishProductionArea $row): array
    {
        return [
            Button::add('delete-row')
                ->slot('- Delete')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['fishProductionAreaId' => $row->id])
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
        try {
            // $this->validate(); // Uncomment this line if you have validation logic

            FishProductionArea::query()->find($id)->update([
                $field => $value,
            ]);

            toastr()->success('Data has been saved successfully');
            // Additional logic after the update if needed...

        } catch (\Exception $e) {
            // Handle the exception, you can log it for debugging
            Log::error('Failed to save data. Error: ' . $e->getMessage());
            toastr()->error('Failed to save data. Please try again. Make sure to input the correct format');
        }

    }
}
