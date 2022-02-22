<?php

namespace App\Models;

use App\User;
use App\Model\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Course ;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
