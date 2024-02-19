<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;
use App\Models\Term;
use App\Models\Description;

class Language extends Model
{
    use HasFactory;
    public $incrementing = false;

    // Relación OTM con ideas

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    // Relación OTM con Terms
   
    public function terms()
    {
        return $this->hasMany(Term::class, 'iso_code');
    }

    // Relación OTM con Description

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }
}