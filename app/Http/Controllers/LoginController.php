<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index(Request $request){
        if ($request->session()->get('role') === 'admin') {
            return redirect('/dashboard');
        }
        return view("login");
    }
    public function submitForm(Request $request){

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6' 
        ]);

        $data = [
            "email" => $request->request->get('email'),
            "password" => md5($request->request->get('password')),
        ];
        $result = UserModel::checkLogin($data);      
        // dd( $result->getData()->data->id);  
        if($result->status() === 400){
            return redirect('/')->with('response', ['status' => 400, 'message'=> "Invalid credentials"]);
        } else {
            $request->session()->put('role', $result->getData()->data->role);
            $request->session()->put('userID', $result->getData()->data->id);
        }
        return redirect('/dashboard');
    }
    public function logout(Request $request){
        $request->session()->forget('role');
        return redirect('/')->with('response', ['status' => 200, 'message' => "Logout Successfully!"]);
    }

}
