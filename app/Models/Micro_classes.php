<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micro_classes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subskill()
    {
        return $this->belongsTo(Subskills::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

}
