<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'status',
        'link',
        'track_id' , 
        

    ];

    // Realationship 

    public function photo(){
        return $this->morphOne(Photo::class , 'photoable');
    }


    public function users() { 
        return $this->belongsToMany(User::class);
    }

    public function Quizzes(){
        return $this->hasMany(Quiz::class , 'course_id');
    }

    public function track(){
        return $this->belongsTo(Track::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

}
