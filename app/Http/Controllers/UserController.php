<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                // 'municipality' => 'exists:municipalities,id',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,user',
            ]);

            $municipality_id = $request->input('municipality', 0);
            // Create the user
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->municipality_id = $municipality_id;
            $user->password = Hash::make($validatedData['password']);
            $user->role = $validatedData['role'];

            $user->save();

            // Redirect back with success message
            toastr()->success('User created successfully!');
            return back();

        } catch (\Exception $e) {
            // Handle the exception
            toastr()->error('An error occurred while creating the user. Please try again.'. $e->getMessage());
            return back();
        }
    }
}
