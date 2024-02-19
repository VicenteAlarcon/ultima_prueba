<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Term;
use App\Models\Description;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

     

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_name',
        'type_id',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

   // Relación many to many con Term

   public function terms()
   {
    return $this->belongsToMany(Term::class, 'term_user', 'user_id', 'term_id');
   }

  // Relación many to many con Description(relación valora)

  public function descriptions()
  {
    return $this->belongsToMany(Description::class, 'description_user', 'user_id', 'description_id')->withPivot('rating', 'date')->withTimestamps();
  }

  // Relación OTM con Descriptions
  public function writeDescritpions()
  {
    return $this->hasMany(Description::class);
  }



  // Relación OTM con Type

  public function type()
  {
    return $this->belongsTo(Type::class);
  }

   /**
    * Obtenemos identificador que se almacenará en la petición del JWT.
    */
    public function getJWTIdentifier()
     {
      return $this->getKey();
    }
    
    /**
     * Método que devuelve un array asociativo que contiene personalizaciones de la petición del JWT.
     */

      public function getJWTCustomClaims(): array
      {
        return [];
      }
    }