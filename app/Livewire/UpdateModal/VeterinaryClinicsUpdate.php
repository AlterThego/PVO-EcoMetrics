<?php

namespace App\Livewire\UpdateModal;


use App\Models\VeterinaryClinics;
use LivewireUI\Modal\ModalComponent;
use App\Enums\VeterinaryClinicsSector;

class VeterinaryClinicsUpdate extends ModalComponent
{
    public function render()
    {
        return view('livewire.update-modal.veterinary-clinics-update');
    }

    public $veterinaryClinicsUpdateId;
    public $municipalityId;
    public $barangayId;
    public $sector;
    public $clinicName;
    public $yearEstablished;
    public $yearClosed;

    public function mount($veterinaryClinicsUpdateId)
    {
        // Load the existing data from the database
        $veterinaryClinics = VeterinaryClinics::find($veterinaryClinicsUpdateId);

        // Set the Livewire component properties with the existing values
        $this->veterinaryClinicsUpdateId = $veterinaryClinics->id;
        $this->municipalityId = $veterinaryClinics->municipality_id;
        $this->barangayId = $veterinaryClinics->barangay_id;
        // $this->sector = $veterinaryClinics->sector;
        $this->sector = VeterinaryClinicsSector::from($veterinaryClinics->sector);
        $this->clinicName = $veterinaryClinics->clinic_name;
        $this->yearEstablished = $veterinaryClinics->year_established;
        $this->yearClosed = $veterinaryClinics->year_closed;
    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $veterinaryClinics = VeterinaryClinics::find($this->veterinaryClinicsUpdateId);

            if (empty($this->yearClosed)) {
                $this->yearClosed = null;
            }

            $this->validate([

                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'sector' => 'required',
                'clinicName' => 'required',
                'yearEstablished' => 'required|integer',
                'yearClosed' => 'nullable|digits:4|integer|min:1900|max:2100',
            ]);

            $veterinaryClinics->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'sector' => $this->sector,
                'clinic_name' => $this->clinicName,
                'year_established' => $this->yearEstablished,
                'year_closed' => $this->yearClosed,
            ]);

            \DB::commit();
            toastr()->success('Item updated successfully!', 'Success');
            return redirect()->to(url()->previous());


        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error updating item: ' . $e->getMessage());

            $this->dispatch('refresh');
            toastr()->error('An error occurred while updating the item. Please try again. Error: ' . $e->getMessage());


            // dd($e->getMessage());
        }
    }


}
