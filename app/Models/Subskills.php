<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subskills extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'subskill_id');
    }

    public function micro_classes()
    {
        return $this->hasMany(Micro_classes::class, 'subskill_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
