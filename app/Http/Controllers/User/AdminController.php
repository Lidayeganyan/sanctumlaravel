<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {  
         $user = Auth::user();
         return view('user.admin', compact('user')); 
         if(!$user){
             return redirect('/login');
         }    
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
