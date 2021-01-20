<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function createUser(Request $request){

        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8|string',
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required|min:8|max:11',
            'identification_number' => 'required|min:1|max:11',
            'birth_date' => 'required|date', //Edad
            'idcities' => 'required'
        ]);

        User::create([
            'email' =>  $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'identification_number' => $request->identification_number,
            'birth_date' => $request->birth_date, //Edad
            'idcities' => $request->idcities,
            'idroles' => 2
            
        ]);


        return response()->json([
            "mensaje" => "Usuario creado"
        ],200);
    }
}
