<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogPost;
// use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function create(){
        return view("posts.create");
    }
    public function index(){


        return view("posts.index",['posts'=>post::paginate(15)]);
    }
    
    public function edit(Request $request,$id){
        $post=post::find($id);
        if(Auth::id()!=$post->user_id){
            return "401 Unauthorized";
        }
        // $name=$post['title'];
        
        // $email=$post['body'];
        return view("posts.edit",['post'=>$post]);
    }
    // return view("update",['id'=>$var,'name'=>$name,'email'=>$email]);$request->route('id')
    public function update(StoreBlogPost $request,$id){
        $post=post::find($id);
        if(Auth::id()!=$post->user_id){
            return "401 Unauthorized";
        }
        
        post::where('id',$id)->update(['title'=>$request->title,'body'=>$request->body]);
        return redirect()->route('posts.index');
    }
    public function destroy($id){
        post::where('id', $id)->delete(); 
        return redirect(route('posts.index'));
        // return view("index",['posts'=>post::paginate(15)]);
    }
    public function store(StoreBlogPost $request){
        $valid = $request->validated();
        // dd($request->file('image'));
        $path = $request->file('image')->store("images","public");
        // $path =Str::replace('public', '', $path);
        // $path =asset('storage'.$path);
        $post=post::create(
             ['title' => $valid['title'] , 'body' => $valid['body'],'image'=>$path, 'user_id'=> Auth::id()]
         );
        // $post->title=$request->title;
        // $post->body=$request->body;
        // 
        // $post->user()->associate(Auth::id());
        // $post->save();
        return redirect()->route('posts.index');
    }
    public function restore(){
        return view("posts/deleted",['posts'=>post::onlyTrashed()->paginate(15)]);
    }
    public function restore4real($id){
        post::onlyTrashed()->where('id',$id)->restore();
        return redirect(route('posts.index'));
    }
    public function view($id){
        $res=post::find($id);
        
        return view("posts.view",['post'=>$res]);
    }
}
