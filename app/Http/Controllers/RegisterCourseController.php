<?php

namespace App\Http\Controllers;

use App\Models\RegisterCourse;
use Exception;
use Illuminate\Http\Request;

class RegisterCourseController extends Controller
{

    /**
     * Create
     * Update: Chỉ được update trường status
     * Delete: Update trường status thành deleted (Không xóa trong db)
     */
    public function createRequest(Request $request)
    {
        RegisterCourse::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'status' => "pending"
        ]);
        return back()->with('message', '登録リクエストを送りました !');
    }
    public function requestToCourse(Request $request)
    {
        $data = $request->only([
            'student_id',
            'course_id',
            'status'
        ]);

        try {
            $checkRegisterRequest = RegisterCourse::query()->where('user_id', $data['user_id'])
                ->where('course_id', $data['course_id'])->first();
            if ($checkRegisterRequest) {
                if ($checkRegisterRequest->status === RegisterCourse::STATUS_ACCEPT || $checkRegisterRequest->status === RegisterCourse::STATUS_REJECT) {
                    return [
                        "status" => 400,
                        "message" => "Khong the update status da chap nhan hoac tu choi"
                    ];
                }
                $checkRegisterRequest->status = $data['status'];
                $checkRegisterRequest->save();
                return [
                    "status" => 200,
                    "data" => $checkRegisterRequest
                ];
            } else {
                $registerRequest = RegisterCourse::create($data);
                return [
                    "status" => 200,
                    "data" => $registerRequest
                ];
            }
        } catch (Exception) {
            return [
                "status" => 400,
                "message" => "Server error - zzzz"
            ];
        }
    }

    public function listRequest(Request $request)
    {
        $data = $request->only([
            'course_id'
        ]);
        try {
            $listRequestRegister = RegisterCourse::query()->where('course_id', $data['course_id'])
                ->where('status', '!=', RegisterCourse::STATUS_DELETED)->get();
            return [
                "status" => 200,
                "data" => $listRequestRegister
            ];
        } catch (Exception) {
            return [
                "status" => 400,
                "message" => "Server error - zzzz"
            ];
        }
    }
}