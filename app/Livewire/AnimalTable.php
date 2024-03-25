<?php

namespace App\Livewire;

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

final class AnimalTable extends PowerGridComponent
{
    // use WithExport;
    public string $sortDirection = 'desc';
    public function setUp(): array
    {
        // $this->showCheckBox();


        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSoftDeletes()
                ->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Animal::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('animal_name')
            ->addColumn('classification')
            ->addColumn('type')
            ->addColumn('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::action('Action'),

            Column::make('Animal name', 'animal_name')
                ->sortable()
                ->searchable(),

            Column::make('Classification', 'classification')
                ->searchable(),

            // Column::make('Type', 'type')
            //     ->searchable(),
            // Column::make('Date Added', 'created_at')
            //     ->sortable()
            //     ->searchable(),


        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('destroy')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Animal $row): array
    {
        $actions = [];
        if (!$row->trashed()) {
            $actions[] = Button::add('update-modal.animal-update')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" /><path fill="currentColor" d="M13 3a1 1 0 0 1 .117 1.993L13 5H5v14h14v-8a1 1 0 0 1 1.993-.117L21 11v8a2 2 0 0 1-1.85 1.995L19 21H5a2 2 0 0 1-1.995-1.85L3 19V5a2 2 0 0 1 1.85-1.995L5 3zm6.243.343a1 1 0 0 1 1.497 1.32l-.083.095l-9.9 9.899a1 1 0 0 1-1.497-1.32l.083-.094z" /></g></svg>')
                ->class('bg-blue-600 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('update-modal.animal-update', ['animalUpdateId' => $row->id]);

            $actions[] = Button::add('delete-row')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/></svg>')
                ->class('bg-red-500 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->openModal('delete-row', ['animalId' => $row->id]);
        } else {
            $actions[] = Button::add('restore-row')
                ->class('bg-yellow-400 rounded-md cursor-pointer text-white px-3 py-2 m-1 text-sm')
                ->slot('<svg viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4"><path fill="currentColor" d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18m-1 5v5l4.28 2.54l.72-1.21l-3.5-2.08V8z" /></svg>')
                ->openModal('restore-row', ['animalId' => $row->id]);
        }

        return $actions;
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
