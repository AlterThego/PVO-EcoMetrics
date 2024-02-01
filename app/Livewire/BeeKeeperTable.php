<?php

namespace App\Livewire;

use App\Models\BeeKeeper;
use App\Models\Municipality;
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

final class BeeKeeperTable extends PowerGridComponent
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
        return BeeKeeper::query()
            ->join('municipalities', 'bee_keepers.municipality_id', '=', 'municipalities.id')

            ->select(
                'bee_keepers.*',
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
            ->addColumn('colonies')
            ->addColumn('bee_keepers')
            ->addColumn('year')
            ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Municipality id', 'municipality_id'),
            Column::make('Colonies', 'colonies')
                ->sortable()
                ->searchable(),

            Column::make('Bee keepers', 'bee_keepers')
                ->sortable()
                ->searchable(),

            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

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

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(BeeKeeper $row): array
    {
        return [
            Button::add('delete-row')
                ->slot('- Delete')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['beeKeeperId' => $row->id])
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
