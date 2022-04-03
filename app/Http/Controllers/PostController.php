<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }
    
        
    
    public function index(){
        $posts = Post::all();
        return view('blog.index' ,compact('posts'));
    }
    
    public function create(){
        return view('blog.create');
        
    }
    public function store(Request $req){
     
     
        $req->validate([
            'title'=>'required',
            'description' =>'required|max:10000',
            'image' =>'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = uniqid() . '-' . $req->title . '.' . 
        $req->image->extension();
        $req->image->move(public_path('images'),$newImageName);
        $slug = SlugService::createSlug(Post::class , 'slug', $req->title);
        
        Post::create([
            'title'=>$req->title,
            'description' => $req->description,
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id'=>auth()->user()->id

        ]);
        return redirect('/blog')->with('message', 'your post has been added !');
    }
    public function show($slug){

        Post::where('slug',$slug)->increment('views');
        $post = Post::where('slug', $slug)->first();
       
        return view('blog.show' ,compact('post'));
    }

    public function edit($slug){
        $post = Post::where('slug', $slug)->first();
        return view('blog.edit' ,compact('post'));

    }

    public function update(Request $req , $slug){

        Post::where('slug',$slug)
            ->update([
                'title'=> $req->title,
                'description'=> $req->description,
                'slug'=>SlugService::createSlug(Post::class , 'slug', $req->title),
                 'user_id'=>auth()->user()->id

            ]);

            return redirect('/blog')->with('message','your blog post has been update');
    }


    public function delete($id){
     
        $post = Post::find($id);
        $post->delete();
        return  redirect('/blog')->with('message','your blog has been deleted');
    }
}
