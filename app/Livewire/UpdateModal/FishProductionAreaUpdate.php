<?php

namespace App\Livewire\UpdateModal;

use App\Models\FishProductionArea;
use Database\Seeders\FishProductionAreaSeeder;
use LivewireUI\Modal\ModalComponent;

class FishProductionAreaUpdate extends ModalComponent
{
    public function render()
    {
        return view('livewire.update-modal.fish-production-area-update');
    }

    public $fishProductionAreaUpdateId;
    public $fishProductionTypeId;
    public $year;
    public $landArea;
    
    public function mount($fishProductionAreaUpdateId)
    {
        // Load the existing data from the database
        $fishProduction = FishProductionArea::find($fishProductionAreaUpdateId);

        // Set the Livewire component properties with the existing values
        $this->fishProductionAreaUpdateId = $fishProduction->id;
        $this->fishProductionTypeId = $fishProduction->fish_production_id;
        $this->year = $fishProduction->year;
        $this->landArea = $fishProduction->land_area;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $fishProduction = FishProductionArea::find($this->fishProductionAreaUpdateId);
            $this->validate([
                'year' => 'required|integer',
                'fishProductionTypeId' => 'required|exists:fish_productions,id',
                'landArea' => 'required|numeric',
            ]);

            $fishProduction->update([
                'fish_production_id' => $this->fishProductionTypeId,
                'year' => $this->year,
                'land_area' => $this->landArea,
            ]);

            \DB::commit();
            toastr()->success('Item updated successfully!', 'Success');
            return redirect()->to(url()->previous());

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error updating item: ' . $e->getMessage());


            toastr()->error('An error occurred while updating the item. Please try again. Error: ' . $e->getMessage());


            dd($e->getMessage());
        }
    }

}
