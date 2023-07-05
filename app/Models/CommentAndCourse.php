<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAndCourse extends Model
{
    use HasFactory;
    protected $table = 'comment_course';

    protected $fillable = [
        'id_student',
        'id_course',
        'content',
        'rating'
    ];

    public function index(){
        $comments = CommentAndCourse::all();
    }
}
