<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Description;
use App\Models\Language;

class Idea extends Model
{
    use HasFactory;

    protected $fillable= [
      'keyword',
      'questions',
      'main_ideas',
      'important_points',
      'description_id',
      'language_id',
    ];
    // Relación many to many con Description

    public function descriptions()
    {
        return $this->belongsToMany(Description::class, 'description_idea', 'idea_id', 'description_id');
    }

    // Relación OTM con Idioma

    public function language()
    {
      return $this->belongsTo(Language::class);

    }
}