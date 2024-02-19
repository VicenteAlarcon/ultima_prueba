<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Description;
use App\Models\Type;
use App\Models\User;
use App\Models\Language;

class Term extends Model
{
    use HasFactory;
    
        protected $fillable=[
        'name',
        'title',
        'date',
        'short_description',
        'type_id',
        'language_id',
    ];

    // Relación many to many con User

    public function users()
    {
        return $this->belongsToMany(User::class, 'term_user', 'term_id', 'user_id');
    }

    // Relación OTM con Description

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

      // Relación OTM con Type

      public function type()
      {
        return $this->belongsTo(Type::class);
      }

      // Relación OTM con Language

      public function language()
      {
        return $this->belongsTo(Language::class, 'iso_code');
      }
}