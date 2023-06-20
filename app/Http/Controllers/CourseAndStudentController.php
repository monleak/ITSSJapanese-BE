<?php

namespace App\Http\Controllers;

use App\Models\CourseAndStudent;
use App\Models\RegisterCourse;
use Illuminate\Http\Request;

class CourseAndStudentController extends Controller
{
    public function addStudentToCourse(Request $request){
        $data = $request->only([
            'register_request_id',
        ]);

        $checkRequest = RegisterCourse::find($data['register_request_id']);
        if($checkRequest){
            $studentAndCourse = new CourseAndStudent;
            $studentAndCourse->course_id = $checkRequest->course_id;
            $studentAndCourse->student_id = $checkRequest->student_id;
            $studentAndCourse->progress = 0;
            $studentAndCourse->save();
            $checkRequest->status = RegisterCourse::STATUS_ACCEPT;
            return [
                "status" => 200,
                "data" => $studentAndCourse
            ];
        }else{
            return [
                "status" => 400,
                "message" => "Khong tim thay register request"
            ];
        }
    }
}
