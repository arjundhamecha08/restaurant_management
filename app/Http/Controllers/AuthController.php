<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function signup(){
        return view("auth/signup");
    }
    public function signuppost(Request $request){
       $request->validate([
            "name"=>"required",
            "email"=> "required|email",
            "password"=> "required|min:8",
            "role"=> "required",
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if($user->save()){
            return redirect(route("login"))->with("success","Registration Successfully");
        }
        return redirect(route("signup"))->with("error","Registration Failed");
    }
    public function login(Request $request){
        return view("auth.login");
    }
    public function loginPost(Request $request){
       $credentials =  $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);
        
        if(Auth::attempt($credentials)){
            if(Auth::check()){
            if(Auth::user()->role == "Admin"){
                    return redirect(route("admin"))->with("success","Login Successfully");
            }
            elseif(Auth::user()->role == "Manager"){
                return redirect(route("manager"))->with("success","Login Successfully");
            }
            elseif(Auth::user()->role == "Cashier"){
                return redirect(route("cashier"))->with("success","Login Successfully");
            }
            elseif(Auth::user()->role == "Chef"){
                return redirect(route("chef"))->with("success","Login Successfully");
            }
            elseif(Auth::user()->role == "Waiter"){
                return redirect(route("waiter"))->with("success","Login Successfully");
            }
        }
        else{
            return redirect(route("login"))->with("error","You are not authorized to access this page");
        }

    }
        return redirect(route("login"))->with("error","Invalid Email or Password");
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect(route("login"))->with("success","Logout Successfully");
    }
}
