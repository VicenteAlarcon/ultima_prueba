<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Term;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
       'type',
       'model',
    ];

// Relaciones OTM

public function users()
{
    return $this->hasMany(User::class);
}

public function terms()
{
    return $this->hasMany(Term::class);
}

}