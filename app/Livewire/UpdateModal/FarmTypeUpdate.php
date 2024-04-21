<?php

namespace App\Livewire\UpdateModal;

use App\Models\FarmType;
use LivewireUI\Modal\ModalComponent;

class FarmTypeUpdate extends ModalComponent
{
    public $farmTypeUpdateId;
    public $farmType;

    public function render()
    {
        return view('livewire.update-modal.farm-type-update');
    }

    public function mount($farmTypeUpdateId)
    {
        // Load the existing data from the database
        $type = FarmType::find($farmTypeUpdateId);

        // Set the Livewire component properties with the existing values
        $this->farmTypeUpdateId = $type->id;
        $this->farmType = $type->type;

    }
    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $type = FarmType::find($this->farmTypeUpdateId);


            $this->validate([
                'farmTypeUpdateId' => 'required',
                'farmType' => 'required',
            ]);

            $type->update([
                'type' => $this->farmType,
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
