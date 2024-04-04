<?php

namespace App\PowerGridThemes;

use \PowerComponents\LivewirePowerGrid\Themes\Tailwind;
use \PowerComponents\LivewirePowerGrid\Themes\Theme;
use PowerComponents\LivewirePowerGrid\Themes\Components\{Actions, Checkbox, Radio, SearchBox,ClickToCopy, Cols, Editable, FilterBoolean, FilterDatePicker, FilterInputText, FilterMultiSelect, FilterNumber, FilterSelect, Footer, Table};

class CustomTheme extends Tailwind
{
    public string $name = 'tailwind';

    public function table(): Table
    {
        return Theme::table('min-w-full')
            ->div('rounded-t-lg relative border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900')
            ->thead('shadow-sm rounded-t-lg bg-gray-200 dark:bg-gray-950')
            ->thAction('font-bold')
            ->tdAction('')
            ->tr('')
            ->trFilters('bg-blue-900 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-0
            shadow-sm dark:bg-gray-900')
            ->th('font-semibold px-5 pr-3 py-1 text-left font-semibold text-gray-700 tracking-wider whitespace-nowrap dark:text-gray-300')
            ->tbody('text-gray-800')
            ->trBody('text-sm border-b bg-white border-gray-100 dark:border-gray-950 hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800')
            ->tdBody('pl-[19px] px-3 py-1 whitespace-nowrap dark:text-gray-200')
            ->tdBodyEmpty('px-2 py-1 whitespace-nowrap dark:text-gray-200')
            ->trBodyClassTotalColumns('!bg-red-800')
            ->tdBodyTotalColumns('px-3 py-2 dark:text-gray-200 text-sm text-gray-600 text-right space-y-2')
        ;
    }

    public function footer(): Footer
    {
        return Theme::footer()
            ->view($this->root() . '.footer')
            ->select('block appearance-none bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-900 dark:text-gray-200 dark:placeholder-gray-200 dark:border-gray-800');
    }

    public function actions(): Actions
    {
        return Theme::actions()
            ->headerBtn('block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600')
            ->rowsBtn('focus:outline-none text-sm py-2.5 px-5 rounded border');
    }

    public function cols(): Cols
    {
        return Theme::cols()
            ->div('select-none')
            ->clearFilter('', '');
    }

    public function editable(): Editable
    {
        return Theme::editable()
            ->view($this->root() . '.editable')
            ->span('flex justify-between')
            ->input('dark:bg-gray-800 bg-gray-50 text-black-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-200 dark:bg-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600 shadow-md');
    }

    public function checkbox(): Checkbox
    {
        return Theme::checkbox()
            ->th('px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider')
            ->label('flex items-center space-x-3')
            ->input('h-4 w-4');
    }

    public function radio(): Radio
    {
        return Theme::radio()
            ->th('px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider')
            ->label('flex items-center space-x-3')
            ->input('form-radio rounded-full transition ease-in-out duration-100');
    }

    public function filterBoolean(): FilterBoolean
    {
        return Theme::filterBoolean()
            ->view($this->root() . '.filters.boolean')
            ->base('min-w-[5rem]')
            ->select('appearance-none block mt-1 mb-1 bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-full dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600', 'max-width: 370px');
    }

    public function filterDatePicker(): FilterDatePicker
    {
        return Theme::filterDatePicker()
            ->base()
            ->view($this->root() . '.filters.date-picker')
            ->input('flatpickr flatpickr-input block my-1 bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-full placeholder-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600');
    }

    public function filterMultiSelect(): FilterMultiSelect
    {
        return Theme::filterMultiSelect()
            ->base('inline-block relative w-full')
            ->select('mt-1')
            ->view($this->root() . '.filters.multi-select');
    }

    public function filterNumber(): FilterNumber
    {
        return Theme::filterNumber()
            ->view($this->root() . '.filters.number')
            ->input('block bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-full min-w-[5rem] placeholder-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600');
    }

    public function filterSelect(): FilterSelect
    {
        return Theme::filterSelect()
            ->view($this->root() . '.filters.select')
            ->base('min-w-[9.5rem] pb-2 pt-2 flex')
            ->select('appearance-none block bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-full dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600');
    }

    public function filterInputText(): FilterInputText
    {
        return Theme::filterInputText()
            ->view($this->root() . '.filters.input-text')
            ->base('min-w-[9.5rem] pb-4 pt-2 flex')
            ->select('appearance-none justify-center block bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-full placeholder-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600')
            ->input('w-full block bg-white text-gray-700 border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600');
    }

    public function searchBox(): SearchBox
    {
        return Theme::searchBox()
            ->input('placeholder-gray-400 text-sm pl-[36px] block w-full float-right bg-white text-gray-700 border border-gray-300 rounded-lg py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 pl-10 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-300 dark:border-gray-600')
            ->iconClose('text-gray-400 dark:text-gray-200')
            ->iconSearch('text-gray-300 mr-2 w-5 h-5 dark:text-gray-200');
    }
}
