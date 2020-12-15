<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $hashed_password=Hash::make($request->password);
        $now=Carbon::now();
        $param=[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$hashed_password,
            "profile"=>$request->profile,
            "created_at"=>$now,
            "update_at"=>$now,
        ];
        DB::table('users')->insert($param);
        return response()->json([
            'message'=>'user created successfuly',
            'data'=>$param
        ],200);



    }
}
