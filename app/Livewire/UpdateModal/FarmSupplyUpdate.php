<?php

namespace App\Livewire\UpdateModal;

use App\Models\FarmSupply;
use LivewireUI\Modal\ModalComponent;

class FarmSupplyUpdate extends ModalComponent
{
    public $farmSupplyUpdateId;
    public $municipalityId;
    public $barangayId;
    public $establishmentName;
    public $yearEstablished;
    public $yearClosed;
    public function render()
    {
        return view('livewire.update-modal.farm-supply-update');
    }

    public function mount($farmSupplyUpdateId)
    {
        // Load the existing data from the database
        $farmSupply = FarmSupply::find($farmSupplyUpdateId);

        // Set the Livewire component properties with the existing values
        $this->farmSupplyUpdateId = $farmSupply->id;
        $this->municipalityId = $farmSupply->municipality_id;
        $this->barangayId = $farmSupply->barangay_id;
        $this->establishmentName = $farmSupply->establishment_name;
        $this->yearEstablished = $farmSupply->year_established;
        $this->yearClosed = $farmSupply->year_closed;
    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $farmSupply = FarmSupply::find($this->farmSupplyUpdateId);

            if (empty($this->yearClosed)) {
                $this->yearClosed = null;
            }

            $this->validate([
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'establishmentName' => 'required',
                'yearEstablished' => 'required|integer',
                'yearClosed' => 'nullable|digits:4|integer|min:1900|max:2100',
            ]);

            $farmSupply->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'establishment_name' => $this->establishmentName,
                'year_established' => $this->yearEstablished,
                'year_closed' => $this->yearClosed,
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
