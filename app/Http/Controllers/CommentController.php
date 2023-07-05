<?php

namespace App\Http\Controllers;

use App\Models\CommentAndCourse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request){
        $course_id = $_GET['course_id'];
        // dd($course_id);
        return(view('comment.create',['course_id'=>$course_id]));
    }

    public function store(Request $request){
        CommentAndCourse::create([
            'id_student' => $_POST['student_id'] ,
            'id_course' => $_POST['course_id'],
            'content' => $_POST['content'],
            'rating' =>  $_POST['rating'],
        ]);        

        return redirect('/listings/'.$_POST['course_id'])->with('message', 'コメントを追加することができました !');
    }
    //
}
