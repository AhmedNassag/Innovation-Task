<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Post;

class PostController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $posts = Post::select('id','title_'.app()->getLocale().' as title','body')->get();
        return $this->apiResponse($posts,'Ok',200);
    }

    
    public function show($id)
    {
        $post = Post::select('id','title_'.app()->getLocale().' as title','body')->find($id);
        
        if($post)
        {
            return $this->apiResponse($post,'Ok',200);
        }

        return $this->apiResponse(null,'The Post Not Found',404);
    }

    
    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(),
        [
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'body'     => 'required',
        ]);

        if ($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $post = Post::create($request->all());

        if($post)
        {
            return $this->apiResponse($post,'The Post Saved',201);
        }

        return $this->apiResponse(null,'The Post Not Saved',400);
    }

    
    public function update(Request $request ,$id)
    {
        $validator  = Validator::make($request->all(),
        [
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'body'     => 'required',
        ]);

        if ($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $post = Post::find($id);

        if(!$post)
        {
            return $this->apiResponse(null,'The Post Not Found',404);
        }

        $post->update($request->all());

        if($post)
        {
            return $this->apiResponse($post,'The Post Updated',201);
        }

    }

    
    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post)
        {
            return $this->apiResponse(null,'The Post Not Found',404);
        }

        $post->delete($id);

        if($post)
        {
            return $this->apiResponse(null,'The Post Deleted',200);
        }
    }
}
