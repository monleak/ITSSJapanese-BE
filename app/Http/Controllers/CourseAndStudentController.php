<?php

namespace App\Http\Controllers;

use App\Models\CourseAndStudent;
use App\Models\RegisterCourse;
use Illuminate\Http\Request;

class CourseAndStudentController extends Controller
{
    public function addStudentToCourse(Request $request){
        // dd($_POST['status']);

        if($_POST['status'] === "accepted"){
            CourseAndStudent::create([
                'course_id' => $_POST['course_id'] ,
                'student_id' => $_POST['student_id'],
                'progress' => 0,
            ]);
            RegisterCourse::where('course_id', $_POST['course_id'])
            ->where('student_id', $_POST['student_id'])->update(['status'=>'accepted']);
            return redirect('/requests')->with('message', '受け取りました。');
        }else{
            RegisterCourse::where('course_id', $_POST['course_id'])
            ->where('student_id', $_POST['student_id'])->update(['status'=>'rejected']);
            return redirect('/requests')->with('message', '操作が成功でした !');
        }
              

        // $data = $request->only([
        //     'register_request_id',
        // ]);

        // $checkRequest = RegisterCourse::query()->where('id',$data['register_request_id'])
        //                 ->whereNotIn('status',[RegisterCourse::STATUS_DELETED,RegisterCourse::STATUS_ACCEPT,RegisterCourse::STATUS_REJECT])
        //                 ->first();
        // if($checkRequest){
        //     $studentAndCourse = new CourseAndStudent;
        //     $studentAndCourse->course_id = $checkRequest->course_id;
        //     $studentAndCourse->student_id = $checkRequest->student_id;
        //     $studentAndCourse->progress = 0;
        //     $studentAndCourse->save();
        //     $checkRequest->status = RegisterCourse::STATUS_ACCEPT;
        //     return [
        //         "status" => 200,
        //         "data" => $studentAndCourse
        //     ];
        // }else{
        //     return [
        //         "status" => 400,
        //         "message" => "Khong tim thay register request"
        //     ];
        // }
    }
}
