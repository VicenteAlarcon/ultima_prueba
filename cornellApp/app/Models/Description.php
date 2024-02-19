<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Term;
use App\Models\User;
use App\Models\Idea;
use App\Models\Language;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'notes',
        'summary',
        'objectives',
        'term_id',
        'user_id',
        'language_id',
    ];
   
    // Relación OTM con Term

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    // Relación many to many con User

    public function users()
    {
        return $this->belongsToMany(User::class, 'description_user', 'description_id', 'user_id')->withPivot('rating', 'date')->withTimestamps();
    }

     // Relación many to many con Ideas

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'description_idea', 'description_id', 'idea_id');
    }
     // Relación OTM con User
     
    public function user()
    {
        return $this->hasMany(User::class);
    }

     // Relación OTM con Language

     public function language()
     {
        return $this->belongsTo(Language::class);
     }
}