<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\CommentCourse;
use Illuminate\Http\Request;

class CommentCourseController extends Controller
{
    public function list(Request $request)
    {
        $data = CommentCourse::all();
        return $data;
    }

    public function createComment(CreateCommentRequest $request)
    {
        CommentCourse::create([
            'content' => $request->content ? $request->content : "",
            'rating' => $request->rating ? $request->rating : -1,
            'student_id' => $request->student_id,
            'course_id' => $request->course_id
        ]);
        return back()->with('message', '登録リクエストを送りました !');
    }
}
