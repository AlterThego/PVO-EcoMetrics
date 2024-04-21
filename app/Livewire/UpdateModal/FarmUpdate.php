<?php

namespace App\Livewire\UpdateModal;

use App\Models\Farm;
use LivewireUI\Modal\ModalComponent;

class FarmUpdate extends ModalComponent
{
    public $farmUpdateId;
    public $municipalityId;
    public $barangayId;
    public $farmName;
    public $farmLevel;
    public $farmArea;
    public $farmSector;
    public $farmTypeId;
    public $yearEstablished;
    public $yearClosed;


    public function render()
    {
        return view('livewire.update-modal.farm-update');
    }

    public function mount($farmUpdateId)
    {
        // Load the existing data from the database
        $farm = Farm::find($farmUpdateId);

        // Set the Livewire component properties with the existing values
        $this->farmUpdateId = $farm->id;
        $this->municipalityId = $farm->municipality_id;
        $this->barangayId = $farm->barangay_id;
        $this->farmLevel = $farm->level;
        $this->farmName = $farm->farm_name;
        $this->farmArea = $farm->farm_area;
        $this->farmSector = $farm->farm_sector;
        $this->farmType = $farm->farm_type;
        $this->yearEstablished = $farm->year_established;
        $this->yearClosed = $farm->year_closed;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $farm = Farm::find($this->farmUpdateId);

            if (empty($this->yearClosed)) {
                $this->yearClosed = null;
            }
            $this->validate([
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'farmName' => 'required',
                'farmLevel' => 'required',
                'farmArea' => 'required|numeric',
                'farmSector' => 'required',
                'farmTypeId' => 'required',
                'yearEstablished' => 'required|integer',
                'yearClosed' => 'nullable|digits:4|integer|min:1900|max:2100',
            ]);

            $farm->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'farm_name' => $this->farmName,
                'level' => $this->farmLevel,
                'farm_area' => $this->farmArea,
                'farm_sector' => $this->farmSector,
                'farm_type_id' => $this->farmTypeId,
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
