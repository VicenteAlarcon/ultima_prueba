<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Term;
use App\Models\User;
class TypeController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
    
      if($type == "tipos"){
        $types = Type::all();
      }
      if($type == "terminos"){
        $types = Type::where('model', '=', 'Término')->get();
      }
      if($type == "usuarios") {
        $types = Type::where('model', '=', 'Usuario')->get();
      }

return view('types.index', compact('types', 'type'));
     
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
          'type' => 'required',
          'model' => 'required',
        ]);
        $type = new Type();
       $type->create([
      'type'=> $request->input('type'),
      'model' => $request->input('model'),
       ]);
    
       return redirect()->route('type.index', ['type' =>'tipos'])->withSuccess('Tipo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      // Paso la tabla terms para poder hacer el return a terms.details
       $type = Type::with('terms')->find($id);

       // Obtenemos variable return de terms.details y la pasamos a la vista de
       //types.details para tratarla en el return. Ponemos false como valor predeterminado.

       $return = request()->query('return', false);
       return view('types.details', compact('type', 'return'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $type = Type::findOrfail($id);
      return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
          'type' => 'required',
          'model' => 'required',
        ]);
        
        $type = Type::findOrFail($id);
        $type->type = $request->input('type');
        $type->model = $request->input('model');
        $type->updated_at = now();//Guardamos la fecha de actualización.
        $type->save();  
       
      

       return redirect()->route('type.index',['type' => 'tipos'])->withSuccess('Tipo actualizado correctamente');

    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
         return redirect()->route('type.index', ['type' =>'tipos'])->withSuccess('Tipo eliminado');
    
    }
}