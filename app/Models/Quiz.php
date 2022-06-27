<?php

namespace App\Models;

use App\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Course ;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_id'
    ];

    public function questions(){
        return $this->hasMany(Question::class,'quize_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
