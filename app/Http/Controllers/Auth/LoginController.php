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

        if (!$result['status']) {
            return response()->json([
                'status' => 0,
                'message' => $result['message']
            ], 401);
        }

        return response()->json([
            'status' => 1,
            'message' => $result['message'],
            'user' => $result['user'],
        ]);
    }
      public function showLoginForm()
    {
        // return view('user.login');
       return redirect()->route('account');
    }
}
