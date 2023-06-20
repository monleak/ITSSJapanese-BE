<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'level',
        'method',
        'description',
        'price',
        'id_teacher',
    ];

    public function Teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
