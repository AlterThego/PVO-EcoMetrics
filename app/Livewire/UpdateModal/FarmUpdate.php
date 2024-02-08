<?php

namespace App\Livewire\UpdateModal;

use App\Models\Farm;
use LivewireUI\Modal\ModalComponent;

class FarmUpdate extends ModalComponent
{
    public $farmUpdateId;
    public $municipalityId;
    public $farmName;
    public $farmArea;
    public $farmSector;
    public $farmType;
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


            $this->validate([
                'municipalityId' => 'required|exists:municipalities,id',
                'farmName' => 'required',
                'farmArea' => 'required|numeric',
                'farmSector' => 'required',
                'farmType' => 'required',
                'yearEstablished' => 'required|integer',
                'yearClosed' => 'required|integer',
            ]);

            $farm->update([
                'municipality_id' => $this->municipalityId,
                'farm_name' => $this->farmName,
                'farm_area' => $this->farmArea,
                'farm_sector' => $this->farmSector,
                'farm_type' => $this->farmType,
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


            dd($e->getMessage());
        }
    }

}
