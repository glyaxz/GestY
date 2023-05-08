<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Comprueba si el Usuario a iniciar sesion es correcto
     *
     * @param Request $request
     * @return JsonResponse $isValid
     */
    public function loginUser(LoginRequest $request){
        if($request->get('email') && $request->get('password') ){
            $request->authenticate();
            $user = $request->user();
            $token = $user->createToken('Token Name')->plainTextToken;
            return response()->json($token);
        }
        return response()->json(false);
    }

    /**
     * Registra un nuevo usuario
     *
     * @param mixed $email
     * @param mixed $passowrd
     * @return boolean $isValid
     */
    public function registerUser(Request $request){
        $isValid = true;
        //
        return $isValid;
    }
}
