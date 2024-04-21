<?php

namespace App\Livewire\UpdateModal;


use App\Models\BeeKeeper;
use LivewireUI\Modal\ModalComponent;

class BeeKeeperUpdate extends ModalComponent
{
    public $beeKeepersUpdateId;
    public $municipalityId;
    public $barangayId;
    public $year;
    public $colonies;
    public $beeKeepers;
    public function render()
    {
        return view('livewire.update-modal.bee-keeper-update');
    }
    public function mount($beeKeepersUpdateId)
    {
        // Load the existing data from the database
        $beekeeper = BeeKeeper::find($beeKeepersUpdateId);

        // Set the Livewire component properties with the existing values
        $this->farmSupplyUpdateId = $beekeeper->id;
        $this->municipalityId = $beekeeper->municipality_id;
        $this->barangayId = $beekeeper->barangay_id;
        $this->year = $beekeeper->year;
        $this->colonies = $beekeeper->colonies;
        $this->beeKeepers = $beekeeper->bee_keepers;
    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $beeKeepers = BeeKeeper::find($this->beeKeepersUpdateId);


            $this->validate([
                'municipalityId' => 'required|exists:municipalities,id',
                'barangayId' => 'required|exists:barangays,id',
                'year' => 'required|integer',
                'colonies' => 'required|integer',
                'beeKeepers' => 'required|integer',
            ]);

            $beeKeepers->update([
                'municipality_id' => $this->municipalityId,
                'barangay_id' => $this->barangayId,
                'year' => $this->year,
                'colonies' => $this->colonies,
                'bee_keepers' => $this->beeKeepers,
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
