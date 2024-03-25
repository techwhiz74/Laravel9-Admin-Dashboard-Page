<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentsModel extends Model
{
    use HasFactory;

    public function getAll(){
        $data = DB::table('students')->get();
        return $data;
    }
}
