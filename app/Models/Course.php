<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    // public function orders(){
    //     return $this->belongsTo(Order::class, 'course_id');
    // }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function course_details(){
        return $this->hasMany(course_details::class);
    }
}
