<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

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

    public function index(Request $request){

        $columna = $request->input('columna'); 
        $orden = $request->input('orden');

    
        if($columna == null){
            $columna = 'id';
        }

        if($orden == null){
            $orden = 'desc';
        }

        $usuarios = User::where('status', 1)->orderBy($columna, $orden)->paginate(10);
        
        for($i = 0; $i < count($usuarios); $i++){
                    
            $usuarios[$i] = [
                'id' => $usuarios[$i]->id,
                'idroles' => $usuarios[$i]->idroles,
                'emai' => $usuarios[$i]->email,
                'name' => $usuarios[$i]->name,
                'last_name' => $usuarios[$i]->last_name,
                'phone' => $usuarios[$i]->phone,
                'identification_number' => $usuarios[$i]->identification_number,
                'birth_date' => $usuarios[$i]->birth_date, 
                'edad' => Carbon::parse( $usuarios[$i]->birth_date )->age,
                'idcities' =>  $usuarios[$i]->idcities
            ];
        }  

        return response()->json([
            "mensaje" => $usuarios
            
        ],200);

    }

    public function deleteUser(Request $request){
        
        $usuario = User::find($request->id);

        if(!$usuario){
            return response()->json([
                "mensaje" => 'null'                
            ],400);    
        }     
        
        $usuario->status = 0;
        $usuario->save();

        return response()->json([
            "mensaje" => 'Usuario eliminado'
            
        ],200);
        

    }

    public function updateUser(Request $request){

        $usuario = User::find($request->id);

        if(!$usuario){
            return response()->json([
                "mensaje" => 'null'                
            ],400);    
        }     

        if($request->name){
            $usuario->name = $request->name;
        }
        if($request->last_name){
            $usuario->last_name = $request->last_name;
        }
        if($request->phone){
            $usuario->phone = $request->phone;
        }
        if($request->identification_number){
            $usuario->identification_number = $request->identification_number;
        }
        if($request->birth_date){
            $usuario->birth_date = $request->birth_date;
        }     
        if($request->idcities){
            $usuario->idcities = $request->idcities;
        }     
             
        $usuario->save();

        return response()->json([
            "mensaje" => 'Usuario actualizado'            
        ],200);

    }
}
