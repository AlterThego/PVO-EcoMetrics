<?php

namespace App\Livewire\UpdateModal;

use App\Models\Disease;
use LivewireUI\Modal\ModalComponent;

class DiseaseUpdate extends ModalComponent
{
    public $diseaseUpdateId;
    public $diseaseName;

    public function render()
    {
        return view('livewire.update-modal.disease-update');
    }

    public function mount($diseaseUpdateId)
    {
        // Load the existing data from the database
        $disease = Disease::find($diseaseUpdateId);

        // Set the Livewire component properties with the existing values
        $this->diseaseUpdateId = $disease->id;
        $this->diseaseName = $disease->disease_name;

    }
    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $disease = Disease::find($this->diseaseUpdateId);


            $this->validate([
                'diseaseUpdateId' => 'required',
            ]);

            $disease->update([
                'disease_name' => $this->diseaseName,
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
