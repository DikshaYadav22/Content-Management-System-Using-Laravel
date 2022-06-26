<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CreatePostsRequest;
use App\Http\Middleware\VerifyCategoriesCount;

class PostsController extends Controller
{
    public function __construct(){
        return $this->middleware('verifycategoriescount')->only(['create', 'store']);
    }
   
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

   
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    
    public function store(CreatePostsRequest $request)
    {
        $image = $request->image->store('posts');
        Post::create([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'image'=>$image,
                'description'=>$request->description,
                'content'=>$request->content,
                'published_At'=>$request->published_At
        ]); 
        session()->flash('success', 'Post created successfully');
        return redirect()->route('posts.index');
    }

    
    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post);
    }

    
    public function update(Request $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_At']);
        if($request->hasFile('image')){
            $image = $request->image->store('posts');

            Storage::delete($post->image);

            $data['image']= $image;


        }
        $post->update($data);
        return redirect()->route('posts.index');
        
    }

    
    public function destroy(Post $post)
    {
       Storage::delete($post->image);
       $post->delete();
       return redirect()->back();
    }
}
