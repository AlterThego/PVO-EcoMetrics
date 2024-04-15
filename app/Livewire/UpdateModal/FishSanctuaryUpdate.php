<?php

namespace App\Livewire\UpdateModal;

use App\Models\FishSanctuary;
use LivewireUI\Modal\ModalComponent;

class FishSanctuaryUpdate extends ModalComponent
{
    public function render()
    {
        return view('livewire.update-modal.fish-sanctuary-update');
    }

    public $fishSanctuaryUpdateId;
    public $barangayId;
    public $municipalityId;
    public $year;
    public $landArea;
    
    public function mount($fishSanctuaryUpdateId)
    {
        // Load the existing data from the database
        $fishSanctuary = FishSanctuary::find($fishSanctuaryUpdateId);

        // Set the Livewire component properties with the existing values
        $this->fishSanctuaryUpdateId = $fishSanctuary->id;
        $this->barangayId = $fishSanctuary->barangay_id;
        $this->municipalityId = $fishSanctuary->municipality_id;
        $this->year = $fishSanctuary->year;
        $this->landArea = $fishSanctuary->land_area;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $fishSanctuary = FishSanctuary::find($this->fishSanctuaryUpdateId);
            $this->validate([
                'year' => 'required|integer',
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'landArea' => 'required|numeric',
            ]);

            $fishSanctuary->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
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


            // dd($e->getMessage());
        }
    }
}
