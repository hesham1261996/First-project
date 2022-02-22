<?php

namespace App\Models;

use  App\Models\Course ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link'
    ];
    public function course (){
        return $this->belongsTo(Course::class);
    }
}
