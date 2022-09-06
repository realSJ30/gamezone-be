<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class UserController extends Controller
{
    //
    public function index(){
        $users = DB::table('users')->get();
        dd($users);
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:18',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $query = $user->save();

        if($query){
            return response()->json(['message'=>'Successfully registered!'], 200);
        }else{
            return response()->json(['message'=>'Error Registering!'], 401);
        }
         
    }
}
