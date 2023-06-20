<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    use HasFactory;

    const STATUS_DELETED = "deleted";
    const STATUS_ACCEPT = "accepted";
    const STATUS_REJECT = "rejected";
    protected $table = "register_request";

    protected $fillable = [
        'course_id',
        'student_id',
        'status'
    ];
}
