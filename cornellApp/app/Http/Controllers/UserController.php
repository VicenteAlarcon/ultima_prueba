<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

   public function getLanguage($id)
   {
    $user = User::find($id);
    $terms = $user->terms;
     
    if($terms->count() > 0) {
        $language = $terms->first()->language_id;
    }
    return view('users.index', compact('language'));

   }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {


      $users = User::all();
      return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
         'first_name' =>'required|string|max:255',
         'last_name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
         'user_name' => 'required|string|max:255',
         'type_id' =>'required|integer',
       ]);


       $user = new User();
              $user->create([
         'first_name' => $validatedData['first_name'],
         'last_name' => $validatedData['last_name'],
         'email' => $validatedData['email'],
         'password' => bcrypt($validatedData['first_name']),
         'user_name' => $validatedData['user_name'],
         'type_id' =>$validatedData['type_id'],
    ]);
     
    return redirect()->route('users.index')->withSuccess('Usuario creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

      // Consulta a la columna tipos para obtener el rol de usuario 
        $type_id = $user->type_id;
        $type = Type::find($type_id);
       $rol = $type->type;
        return view('users.details', compact('user', 'rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $user = User::find($id);
        return View::make('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  
      
      $request->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'user_name' => 'required',
          'password' => 'required',
          'type_id' => 'required',
        ]);
       $user = User::find($id);

      

       $user->update([
         'first_name' => $request->input('first_name'),
         'last_name' => $request->input('last_name'),
         'email' => $request->input('email'),
         'password' => $request->input('password'),
         'user_name' => $request->input('user_name'),
         'type_id' =>$request->input('type_id'),
    ]);
      

       return redirect()->route('users.show',['user' => $id])->withSuccess('Usuario actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
         return redirect()->route('users.index')->withSuccess('Usuario eliminado');
    }
}