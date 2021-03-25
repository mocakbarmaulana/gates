<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Teacher extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    protected $fillable = ['name', 'email', 'address', 'password', 'status'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function getCutNameAttribute($value){
        if (strlen($value) > 20) {
            return substr($value,0,20) . '...';
        } else {
            return $value;
        }
    }

    public function getCheckStatus($value){
        if ($value == 1){
            return "fas fa-check-circle text-success";
        } else {
            return "fas fa-times-circle text-danger";
        }
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}