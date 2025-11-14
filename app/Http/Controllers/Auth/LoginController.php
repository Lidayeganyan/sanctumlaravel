<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreLoginRequests;
use App\Services\User\LoginService;
use App\Http\Requests\User\StoreRegistrationRequests;
use App\Services\User\RegistrationService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function store(StoreLoginRequests $request)
    {
        $result = $this->loginService->login($request->validated());

        return redirect()->route('account')->with($result)->with('success', 'Registration successful!');
 
    }
    public function showLoginForm()
    {
        if(Auth::check() && Auth::user() ){
            return redirect()->route('account');
        }
         return view('user.login');
    }
}
