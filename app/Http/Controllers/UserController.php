<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $user =  User::where(['email'=> $req->email])->first();
        if(!$user || !Hash::check($req->password , $user->password))
        {
            return "User name matched not";
        }
        else
        {
            $req->session()->put('user', $user);
            return redirect('/');
        }

        
    }

    public function register(Request $req)
    {
       $user = new User;
       $user->name = $req->name;
       $user->email = $req->email;
       $user->password = Hash::make($req->password);
       $user->save();

       return redirect('/login');
    }
}
