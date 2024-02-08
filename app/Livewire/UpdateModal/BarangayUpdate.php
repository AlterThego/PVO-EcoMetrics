<?php

namespace App\Livewire\UpdateModal;


use App\Models\Barangay;
use LivewireUI\Modal\ModalComponent;

class BarangayUpdate extends ModalComponent
{
    public $barangayUpdateId;
    public $municipalityId;
    public $barangayName;

    public function render()
    {
        return view('livewire.update-modal.barangay-update');
    }

    public function mount($barangayUpdateId)
    {
        // Load the existing data from the database
        $barangay = Barangay::find($barangayUpdateId);

        // Set the Livewire component properties with the existing values
        $this->barangayUpdateId = $barangay->id;
        $this->municipalityId = $barangay->municipality_id;
        $this->barangayName = $barangay->barangay_name;
    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $barangay = Barangay::find($this->barangayUpdateId);


            $this->validate([
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayName' => 'required',
            ]);

            $barangay->update([
                'municipality_id' => $this->municipalityId,
                'barangay_name' => $this->barangayName,
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
