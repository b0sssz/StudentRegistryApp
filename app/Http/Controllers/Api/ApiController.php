<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    //Registry API (POST)

    public function register(){
        return view('auth/register');
    }

    public function registerSave(Request $request){

        //Data validation
       Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed",

        ])->validate();

        //create user
        User::create([

            "name"=>$request ->name,
            "email"=>$request ->email,
            "password"=>Hash::make($request ->password),
            "level" => "Admin"

        ]);

       

        return redirect()->route('login');
    }

    public function login(){
        return view('auth/login');
    }

    //Login API (POST)

    public function loginAction(Request $request){

        //data validation
        Validator::make($request->all(),[

            "email"=>"required|email",
            "password"=>"required",
        ])->validate();

        

        //checking user login
       if( Auth::attempt([
            "email"=>$request ->email,
            "password"=>$request ->password,
        ])){

            //user exist

            $user = Auth::user();

            


            return redirect()->route('dashboard');
        }else{
            
            return response()->json([
                "status" => false,
                "meesage" => "Invalid login details"
            ]);
        }

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');


    }

    


    //Log out API (GET)
    public function logout(Request $request){
        
       
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');

    }

    public function profile(){
        return view('profile'); 
    }

    
}
