<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller


{

    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
         
        ]);

        $user = \App\Models\User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        return redirect('/')->withSuccess('¡Registro realizado!');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
             'email.required' => 'El campo email es obligatorio.',
             'email.email' => 'Ingresa una dirección de email válida.',
             'password.required' => 'El password es obligatorio.',
        ]);
  
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
         }
         $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials)) {

            return redirect('/home');
         }

         return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas']);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('first');
    }
   



}