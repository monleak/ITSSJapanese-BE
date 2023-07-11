<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'email',
        'fullname',
        'gender',	
        'password',
        'designation',	
        'skills',
        'experience',	
        'description',
        'photo',
        'facebook',
        'zalo',
        'email',
        'phoneNumber',
        'twitter',
    ];

    public function Courses(){
        return $this->hasMany(Course::class);
    }
}
