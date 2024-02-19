<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Type;
Use App\Models\Description;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\EnglishTermService;
use App\Services\SpanishTermService;
use App\Services\DeustchTermService;
use App\Services\FrenchTermService;
use App\Services\ValenTermService;
class TermController extends Controller
{

  // Inyectamos servicios para recoger los textos en el idioma correspondiente
   
  protected $userService;

  public function __construct(EnglishTermService $englishService, SpanishTermService $spanishService, 
  DeustchTermService $deustchService, FrenchTermService $frenchService, ValenTermService $valenService)
  {
    $this->englishService = $englishService;
    $this->spanishService = $spanishService;
    $this->deustchService = $deustchService;
    $this->frenchService = $frenchService;
    $this->valenService = $valenService;
  }




    /**
     * Display a listing of the resource.
     */


    public function index($term)
    {
     /**
      * Consulta y condicionales para las opciones de Términos
      */
    $user = Auth::user();
    $en = $this->englishService->englishTerms();
    $es = $this->spanishService->spanishTerms();
    $fr = $this->frenchService->frenchTerms();
    $de = $this->deustchService->deustchTerms();
    $de = $this->deustchService->deustchTerms();  
    $va = $this->valenService->valenTerms();

    $terminos = true;
    $terms_id = DB::table('descriptions')
    ->join('users', 'descriptions.user_id', '=', 'users.id')
    ->where('descriptions.user_id', $user->id)
    ->select('descriptions.term_id')
    ->get()
    ->pluck('term_id');

      if($term == "terminos"){
        $terms = Term::with('users', 'descriptions')->get();
 

      }
      if($term == "propios"){
        $terms = Term::whereIn('id', $terms_id)->get();
        $terminos =false;
    
       }

      if($term == "otros") {
        $terms = Term::whereNotIn('id', $terms_id)->get();
        $terminos = false;
      
      }

       return view('terms.index', [ 'terms'=>$terms, 'terminos'=>$terminos]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $types = Type::all();
       return view('terms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'date' =>'required',
        'short_description'=>'required',
        'type_id'=>'required',
        'language_id'=>'required',
       ]);
      

       /**
        * Usamos el usuario autenticado para asociarle los términos creados.
        * Antes de crear el término filtramos para que no se repitan los nombres.
        */
       $auth_user = Auth::user();
       $form_name = $request->input('name');
       $names = Term::pluck('name');

       foreach($names as $name){

        if($name !== $form_name){

       $term =$auth_user->terms()->create([
      'name'=> $request->input('name'),
      'date' => $request->input('date'),
      'short_description' => $request->input('short_description'),
      'type_id'=> $request->input('type_id'),
      'language_id' => $request->input('language_id'),
       ]);
       return redirect()->route('term.index', ['term'=>'terminos'])->withSuccess('Termino creado correctamente');
        }
        else{
           return back()->withErrors(['error' =>'El nombre de término ya existe']);
        }
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

       $term = Term::with('type')->find($id);
       $rating = Term::with('descriptions.users')->find($id);
       return view('terms.details', ['term' => $term, 'rating', $rating])->with('types', 'descriptions.ideas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $term = Term::with('type')->find($id);
        return view('terms.edit', ['term' => $term]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
        'name'=>'required',
        'title' => 'required',
        'date'=>'required',
        'short_description'=>'required',
        'type_id'=>'required',
        'language_id' => 'required'
        ]);
      $term = Term::findOrFail($id);

       $term->update([
         'name' => $request->input('name'),
         'title' => $request->input('title'),
         'date' => $request->input('date'),
         'short_description' => $request->input('short_description'),
          'type_id'=> $request->input('type_id'),
         'language_id' => $request->input('language_id'),
    ]);
      

       return redirect()->route('terms.show',['term' => $id])->withSuccess('Término actualizado correctamente');;

    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $term = Term::findOrFail($id);
        $term->delete();
         return redirect()->route('term.index', ['term'=> 'terminos'])->withSuccess('Término eliminado');
    }
}