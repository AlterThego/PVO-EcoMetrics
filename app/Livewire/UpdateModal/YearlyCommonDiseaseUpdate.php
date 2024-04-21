<?php

namespace App\Livewire\UpdateModal;


use App\Models\YearlyCommonDisease;
use LivewireUI\Modal\ModalComponent;

class YearlyCommonDiseaseUpdate extends ModalComponent
{
    public function render()
    {
        return view('livewire.update-modal.yearly-common-disease-update');
    }

    public $yearlyCommonDiseaseUpdateId;
    public $diseaseId;
    public $year;
    public $diseaseCount;




    public function mount($yearlyCommonDiseaseUpdateId)
    {
        // Load the existing data from the database
        $yearlyCommonDisease = YearlyCommonDisease::find($yearlyCommonDiseaseUpdateId);

        // Set the Livewire component properties with the existing values
        $this->yearlyCommonDiseaseUpdateId = $yearlyCommonDisease->id;
        $this->diseaseId = $yearlyCommonDisease->disease_id;
        $this->year = $yearlyCommonDisease->year;
        $this->diseaseCount = $yearlyCommonDisease->disease_count;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $yearlyCommonDisease = YearlyCommonDisease::find($this->yearlyCommonDiseaseUpdateId);


            $this->validate([
                'year' => 'required|integer',
                'diseaseId' => 'required|exists:diseases,id',
                'diseaseCount' => 'required|integer',
            ]);

            $yearlyCommonDisease->update([
                'disease_id' => $this->diseaseId,
                'year' => $this->year,
                'disease_count' => $this->diseaseCount,
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
