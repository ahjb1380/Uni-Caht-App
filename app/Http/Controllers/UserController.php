<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUser(string $id){
        $user = DB::table('users')->select('id','name','email','avatar')->where('id', $id)->get();

        return view('user', ['data' => $user]);
    }
}
