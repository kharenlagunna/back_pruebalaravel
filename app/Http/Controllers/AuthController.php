<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Función para el login del usuario

    public function auth(Request $request){

        // Validación del usuario y correo Contraseña 
        // Contraseña: (mínimo 8 caracteres, obliga: un número, una letra mayúscula, un carácter especial)
        // Email: Tipo correo

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|min:8|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
        ]);

        // Mensaje con los errores encontrados si existen

        if ($validator->fails()) {            
            return response()->json([
                "mensaje" => $validator->errors()
            ],400);
        }
       
        $credenciales = request(['email','password']);

        // Validación para autenticación del usuarios

        if(!Auth::attempt($credenciales)){
            return response()->json([
                'mensaje' => 'No autorizado'
            ],401);
        }

        // Validación para  los usuarios inactivo o eliminados

        $usuario = $request->user();

        if($usuario->status == 0){

            return response()->json([
                'mensaje' => 'Usuario Inactivo'
            ],400);

        }

        // Creación del token para el usuario que se esta logueando
        
        $token_result = $usuario->createToken('Access Token');
        $token = $token_result->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $token_result->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token_result->token->expires_at
            )->toDateTimeString()
        ]);  
    }
}
