<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRegistrationRequests;
use App\Services\User\RegistrationService;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function __construct(
        protected RegistrationService $registrationService
    ) {}
    public function index()
    {
        return $this->showForm(); 
    }
    public function showForm()
    {
        return view('user.registration');
    }

    public function store(StoreRegistrationRequests $request)
    {
       $user = $this->registrationService->register($request->validated());
       Auth::login($user);
       return redirect()->route('account')->with('user', $user)->with('success', 'Registration successful!');
    }
}
