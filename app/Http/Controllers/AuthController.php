<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function auth(Request $request){

        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8|string',
        ]);

        $credenciales = request(['email','password']);

        if(!Auth::attempt($credenciales)){
            return response()->json([
                'mensaje' => 'No autorizado'
            ],401);
        }

        $usuario = $request->user();

        if($usuario->status == 0){

            return response()->json([
                'mensaje' => 'Usuario Inactivo'
            ],400);

        }
        
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

    public function usuario(Request $request){
        return reponse()->json($request->usuario());
    }
}
