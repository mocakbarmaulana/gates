<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Course;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Mutator
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }

    // Accessor
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function subskills()
    {
        return $this->hasMany(Subskills::class);
    }

    public function achievments()
    {
        return $this->hasMany(Achievement::class);
    }
}
