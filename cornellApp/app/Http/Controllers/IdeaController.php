<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Term;
use App\Models\Description;
class IdeaController extends Controller
{
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('ideas.create')->with('ideas.descriptions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      
        $request->validate([
        'keyword'=>'required',
        'questions' =>'required',
        'main_ideas'=>'required',
        'important_points'=>'required',
        'language_id'=>'required',
       ]);
      
    
 $description = Description::find($request->description_id);
    
       $idea =$description->ideas()->create([
      'keyword'=> $request->input('keyword'),
      'questions' => $request->input('questions'),
      'main_ideas' => $request->input('main_ideas'),
      'important_points'=> $request->input('important_points'),
      'language_id' => $request->input('language_id'),
       ]);

       $term_id = $description->term_id;
        if ($description) {
          
            return redirect()->route('terms.show', ['term'=>$term_id])->with('success', 'Idea creada y asociada a la descripción.');
        } else {
            return redirect()->route('terms.show', ['term'=>$term_id])->with('error', 'No se encontró la descripción para asociar la idea.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $idea = Idea::find($id);
       return view('ideas.details', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $idea = Idea::find($id);
       return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'keyword'=>'required',
        'questions' =>'required',
        'main_ideas'=>'required',
        'important_points'=>'required',
        'language_id'=>'required',
       ]);
      
    
 $description = Description::find($request->description_id);
    
       $idea =$description->ideas()->update([
      'keyword'=> $request->input('keyword'),
      'questions' => $request->input('questions'),
      'main_ideas' => $request->input('main_ideas'),
      'important_points'=> $request->input('important_points'),
      'language_id' => $request->input('language_id'),
       ]);

       $term_id = $description->term_id;
        if ($description) {
          
            return redirect()->route('terms.show', ['term'=>$term_id])->with('success', 'Idea actualizada correctamente.');
        } else {
            return redirect()->route('terms.show', ['term'=>$term_id])->with('error', 'No se encontró la descripción para asociar la idea.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $idea = Idea::findOrFail($id);
        $idea->delete();
        return back()->withSuccess('Idea eliminada');
    }
}