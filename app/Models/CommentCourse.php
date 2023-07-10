<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentCourse extends Model
{
    use HasFactory;

    protected $table = 'comment_course';

    protected $fillable = [
        'content',
        'rating',
        'student_id',
        'course_id'
    ];
}
