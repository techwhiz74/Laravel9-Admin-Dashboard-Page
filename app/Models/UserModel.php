<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\InvalidOrderException;
class UserModel extends Model
{
    use HasFactory;
    public function checkLogin($data)
    {
        try {
            $respone = DB::table('users')->where($data)->first();
            if($respone !== null){
                $respone =  response()->json(['success' => 'success', 'data' => $respone], 200);
            } else {
                $respone =  response()->json(['success' => 'error'], 400);
            }
            return  $respone;            
        } catch(\Exception $exception){
            return $exception->getMessage();

        }

    }
    public function insert($data){
        DB::table('users')->insert($data);
        return response()->json(['success' => 'success'], 200);
    }

    public function allUsers(){
        return DB::table('users')->get();
    }

    public function deleteUSer($userID){
        return  DB::table('users')->where('id', $userID)->where('role', '!=', 'admin')->delete();
    }

    public function getUserbyID($userID){
        return  DB::table('users')->where('id', $userID)->get(); 
    }

}