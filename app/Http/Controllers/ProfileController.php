<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateProfile;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); 
        return view('user.edit', compact('user'));
    }

    public function update(UpdateProfile $request)
    {
        // $user = Auth::user();

         $user = auth()->user();
         $user->update($request->validated());

        return redirect()->route('account')->with('success', 'Profile updated successfully!');
    }

    public function show()
    {
        return view('user.edit');
    }
}
