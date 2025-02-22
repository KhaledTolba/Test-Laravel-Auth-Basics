<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        $formFields = [
            'name' => $request->name,
            'email' => $request->email
        ];
        // Also, update the password if it is set
        if ($request->has('password')){
            $formFields['password'] = Hash::make($request->input('password'));
        }
        auth()->user()->update($formFields);
        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
