<?php

namespace App\Livewire\UpdateModal;

use App\Models\FishProduction;
use LivewireUI\Modal\ModalComponent;

class FishProductionUpdate extends ModalComponent
{
    public function render()
    {
        return view('livewire.update-modal.fish-production-update');
    }

    public $fishProductionUpdateId;
    public $fishType;

    public function mount($fishProductionUpdateId)
    {
        // Load the existing data from the database
        $fishProduction = FishProduction::find($fishProductionUpdateId);

        // Set the Livewire component properties with the existing values
        $this->fishProductionUpdateId = $fishProduction->id;
        $this->fishType = $fishProduction->type;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $fishProduction = FishProduction::find($this->fishProductionUpdateId);


            $this->validate([
                'fishProductionUpdateId' => 'required',
            ]);

            $fishProduction->update([
                'type' => $this->fishType,
            ]);

            \DB::commit();
            toastr()->success('Item updated successfully!', 'Success');
            return redirect()->to(url()->previous());

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error updating item: ' . $e->getMessage());


            toastr()->error('An error occurred while updating the item. Please try again. Error: ' . $e->getMessage());


            // dd($e->getMessage());
        }
    }

}
