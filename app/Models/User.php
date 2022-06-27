<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Track ;
use App\Models\Photo ;
use App\Models\Quiz;
use App\Models\Course ;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'score'
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
    ];

// Relationshep

    public function photo(){
        return $this->morphOne(Photo::class , 'photoable');
    }

    public function tracks(){

        return $this->belongsToMany(Track::class);

    }
    public function courses(){

        return $this->belongsToMany(Course::class);
    }
    public function Quizzes(){
        return $this->belongsToMany(Quiz::class);
    }


}
