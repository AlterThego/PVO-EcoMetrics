<?php

namespace App\Livewire\UpdateModal;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UserUpdate extends ModalComponent
{
    public $userUpdateId;
    public $name;
    public $email;
    public $password;
    public $re_password;
    public $role;
    public $municipalityId;
    public function render()
    {
        return view('livewire.update-modal.user-update');
    }

    public function mount($userUpdateId)
    {
        // Load the existing data from the database
        $userUpdate = User::find($userUpdateId);

        // Set the Livewire component properties with the existing values
        $this->userUpdateId = $userUpdate->id;
        $this->name = $userUpdate->name;
        $this->email = $userUpdate->email;
        $this->password = $userUpdate->password;
        $this->re_password = $userUpdate->password;
        $this->role = $userUpdate->role;
        $this->municipalityId = $userUpdate->municipality_id;

    }

    public function updateitem()
    {
        \DB::beginTransaction();
        try {
            $userUpdate = User::find($this->userUpdateId);

            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:8',
                'role' => 'required',
                'municipalityId' => 'required|exists:municipalities,id',
                're_password' => 'nullable|same:password'
            ], [
                're_password.same' => 'The password and re-entered password must match.',
            ]);

            $userUpdate->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role,
                'municipality_id' => $this->municipalityId,

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
