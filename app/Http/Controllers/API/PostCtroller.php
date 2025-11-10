<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::paginate(5);
        return response()->json([
            'status'=> 1,
            'message' => 'Post fetched',
            'data' => $posts
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "title"=> "required|string|max:15",
            "content"=> "required|string|max:255",
            'status'=> 'nullable',
            'description'=> "required|string|max:255",
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'message' => 'validation errors.',
                'data' => $validator->errors()->all()
            ]);
        }

    }
}
