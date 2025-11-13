<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required',
            'config_password'=>'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'message' => 'validation errors.',
                'data' => $validator->errors()->all()
            ]);
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $response = [];
        $response['token'] = $user->createToken('MyApp')-> plainTextToken;
        $response['name'] = $user->name;
        $response['email'] = $user->email;
            return response()->json(
                [
                    'status' => 1,
                    'message'=>'user registered',
                    'data'=>$response
                ]);
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=> $request->email,'password'=>$request->password]))
        {
            $user = Auth::user();
            $response = [];
            $response['name'] = $user->name;
            $response['email'] = $user->email;
            return response()->json([
                'status'=> 1,
                'message'=> 'user registred',
                'data' => $response
            ]);
        }
        return response()->json([
                'status'=> 0,
                'message' => 'Authentication error. ',
                'data' => null
            ]);
    }
}
