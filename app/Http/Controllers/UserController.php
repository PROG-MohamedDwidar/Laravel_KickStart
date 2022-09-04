<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public $users;

    function __construct() {
        // $this->users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);
    }


    public function home(){
        return view('welcome');
    }
    public function create(){
        return view("users/create");
    }
    public function index(){
        // $posts=User::find
        return view("users/index",['users'=>User::withCount('posts')->paginate(15)]);
    }
    ///----------------------IMPORTANT-----------------------///
    ///don't forget to ask about request reserved identifiers///
    ///------------------------------------------------------///
    public function edit(Request $request,$id){
        $user=User::find($id);
        
        $name=$user['name'];
        
        $email=$user['email'];
        return view("users/edit",['id'=>$id,'name'=>$name,'email'=>$email]);
    }
    // return view("update",['id'=>$var,'name'=>$name,'email'=>$email]);$request->route('id')
    public function update(Request $request,$id){
        User::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email]);
        return redirect(route('users.index'));
    }
    public function destroy($id){
        User::where('id', $id)->delete(); 
        return redirect(route('users.index'));
        // return view("index",['users'=>User::paginate(15)]);
    }
    public function store(Request $request){
        User::create(
            ['name' => $request->name , 'email' => $request->email , 'password' => $request->pass]
            );

            return redirect(route('users.index'));
    }

    public function details($id){
        $user=User::find($id);
        $posts=User::find($id)->posts()->paginate(15);
        return view("users/details")->with(['posts'=>$posts,'user'=>$user]);
    }

    public function logout(){
        Auth::logout();
        return redirect(route('users.index'));
    }
}
// return view("users/details")->with(['posts'=>$posts,'user'=>$user]);