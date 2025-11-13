<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'message' => 'validation errors.',
                'data' => $validator->errors()->all()
            ]);
        }
        $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return response()->json([
            'status'=>1,
            'message'=>'Post created',
            'data'=>$post
        ]);
    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        return response()->json([
            'status' => 1,
            'message'=>'Post returned.',
            'data' => $post
        ]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
        [
             'title' => 'required',
             'body' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'message' => 'validation errors.',
                'data' => $validator->errors()->all()
            ]);
        }
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response()->json([
            'status' => 1,
            'message'=>'Post updated.',
            'data' => $post
        ]);
    }
    public function destroy(Request $request,$id)
    {
        $post = Post::find($id);
        $post->delete();
        
        return response()->json([
            'status' => 1,
            'message' =>'Post removed',
            'data' => null
        ]);
    }
}
