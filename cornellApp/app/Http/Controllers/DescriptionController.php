<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\User;
use App\Models\Description;
use Illuminate\Support\Facades\Auth;
class DescriptionController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Pasamos todos los términos para poder redireccionar a el index de terms.
        $terms = Term::all();
        return view('descriptions.create', compact('terms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $user = Auth::user()->id;
        $request->validate([
        'title'=>'required',
        'notes' =>'required',
        'summary'=>'required',
        'objectives'=>'required',
        'term_id'=>'required',
        'language_id'=>'required',
       ]);
      
    

    $description = new Description();
       $description = new Description([
      'title'=> $request->input('title'),
      'notes' => $request->input('notes'),
      'summary' => $request->input('summary'),
      'objectives' => $request->input('objectives'),
      'term_id'=> $request->input('term_id'),
      'user_id'=> $user,
      'language_id' => $request->input('language_id'),
          
       ]);
      $description->save();
       $term_id = $description->term_id;
     return redirect()->route('terms.show', ['term'=> $term_id])->withSuccess('Descripción creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $description = Description::find($id);
       return view('descriptions.details', compact('description'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $description = Description::find($id);
      if ($description) {
    // Obtener todos los términos relacionados con la descripción
    $terms = $description->term;
}
       return view('descriptions.edit', compact('description', 'terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         {
      $request->validate([
        'title' => 'required',
        'notes'=>'required',
        'summary'=>'required',
        'objectives'=>'required',
        'language_id' => 'required'
        ]);
      $description = Description::findOrFail($id);

       $description->update([
         'title' => $request->input('title'),
         'notes' => $request->input('notes'),
         'summary' => $request->input('summary'),
         'objectives' => $request->input('objectives'),
         'language_id' => $request->input('language_id'),
    ]);
      

       return redirect()->route('descriptions.edit',['description' => $id])->withSuccess('Término actualizado correctamente');;

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
               $description = Description::findOrFail($id);
              $description->delete();
              return redirect()->route('terms.show', ['term'=>$terms->id]);
    }

    /**
     * Método para mostrar el formulario de valoración
     */
    public function showRatingForm()
    {
      // Consultas para mostrar los campos de los select por medio de los nombres.
      // Obtenemos todas las descripciones y los usuarios que tienen alguna descripción.

       $descriptions = Description::all();
       $users_descriptions = User::whereHas('descriptions')->get();
       $users = User::all();
        return view('descriptions.rating', compact('descriptions', 'users_descriptions', 'users'));


    }
     
    /**
     * Método para atacar a la table pivote de la relación Many to Many 
     * de Usuario y Descripción. 
     */

    public function attachDescription(Request $request)
{
 
  $userId = $request->input('user_id');
  $descriptionId = $request->input('description_id');
  $rating = $request->input('rating');

// Buscamos en la relación many to many de User-Description mediante el método descriptions()
// para obtener si hay alguna coincidencia de id's de descripciones y filtrar en base a ello.
   $existingRating = User::find($userId)->descriptions()->where('description_id', $descriptionId)->exists();
   if(!$existingRating) {
        $user = User::find($userId);  
        $user->descriptions()->attach($descriptionId, ['rating' => $rating, 'date' => now()]);
    return redirect()->back()->with('success', 'Valoración adjuntada correctamente');
      }else{
            return redirect()->back()->with('error', 'El usuario ya ha valorado esta descripción previamente');
      }
  
}
}