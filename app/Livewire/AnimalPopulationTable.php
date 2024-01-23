<?php

namespace App\Livewire;

use App\Models\Municipality;
use App\Models\Animal;
use App\Models\AnimalPopulation;
use App\Models\AnimalType;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Url;
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
    public bool $deferLoading = true;
    public string $loadingComponent = 'components.my-custom-loading';
    protected $queryString = ['filters'];
    protected array $rules = [
        // 'name.*' => ['required', 'min:6'],
    ];
    public function hydratePage(): void
    {
        $this->paginators['page'] = $this->page;
    }
    #[Url]
    public string|int $page = 1;

    public function updatedPaginators($value): void
    {
        $this->page = $value;
    }

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return AnimalPopulation::query();
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
            ->addColumn('animal_type_name')
            ->addColumn('year')
            ->addColumn('animal_population_count')
            ->addColumn('volume');
        // ->addColumn('updated_at')
        // ->addColumn('created_at');
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
            Column::make('Animal type id', 'animal_type_id'),


            Column::make('Animal population count', 'animal_population_count')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

            Column::make('Volume', 'volume')
                ->sortable()
                ->searchable(),


            // Column::make('Updated at', 'updated_at')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            // Filter::number('id', 'id')
            //     ->thousands('.')
            //     ->decimal(','),

            Filter::inputText('year')->operators(['contains']),

            Filter::select('municipality_id', 'id')
                ->dataSource(Municipality::all())
                ->optionLabel('municipality_name')
                ->optionValue('id'),

            Filter::select('animal_id', 'id')
                ->dataSource(Animal::all())
                ->optionLabel('animal_name')
                ->optionValue('id'),

            Filter::select('animal_type_id', 'id')
                ->dataSource(AnimalType::all()->filter(function ($animal) {
                    return $animal->type !== null;
                }))
                ->optionLabel('type')
                ->optionValue('id'),




        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(AnimalPopulation $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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

    // public function onUpdatedToggleable(string|int $id, string $field, string $value): void
    // {
    //     AnimalPopulation::query()->where('id', $id)->update([
    //         $field => $value,
    //     ]);

    //     $this->skipRender();
    // }

}
