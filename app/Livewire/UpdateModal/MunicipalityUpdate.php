<?php

namespace App\Livewire\Updatemodal;

use App\Models\Municipality;
use LivewireUI\Modal\ModalComponent;

class MunicipalityUpdate extends ModalComponent
{
    public $municipalityUpdateId;
    public $municipalityName;
    public $zipCode;
    public $landArea;
    public function render()
    {
        return view('livewire.update-modal.municipality-update');
    }

    public function mount($municipalityUpdateId)
    {
        // Load the existing data from the database
        $municipality = Municipality::find($municipalityUpdateId);

        // Set the Livewire component properties with the existing values
        $this->barangayUpdateId = $municipality->id;
        $this->municipalityName = $municipality->municipality_name;
        $this->zipCode = $municipality->zip_code;
        $this->landArea = $municipality->land_area;
    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $municipality = Municipality::find($this->municipalityUpdateId);


            $this->validate([
                'municipalityName' => 'required',
                'zipCode' => 'required|integer',
                'landArea' => 'required|numeric',
            ]);

            $municipality->update([
                'municipality_name' => $this->municipalityName,
                'zip_code' => $this->zipCode,
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
