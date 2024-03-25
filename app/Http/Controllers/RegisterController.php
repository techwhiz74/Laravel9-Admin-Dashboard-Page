<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;


class RegisterController extends Controller
{
    public function registerUser(Request $request){
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6' 
        ]);

        $data = [
            'name' => $request->get('fname').' '.$request->get('lname'),
            "email" => $request->get('email'),
            "email_verified_at" => null,
            "role" => 'guest',
            "password" => md5($request->get('password')),
            "remember_token" => $request->get('_token')
        ];
        
        $result = UserModel::insert($data);
     
        if($result->status() === 200){
            return redirect('/')->with('response', ['status' => 200, 'message' => "Your account have been created successfully!"]);
        } 

        
    }
}
