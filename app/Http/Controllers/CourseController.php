<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Course table
    // id		
    // name		
    // level		
    // method		
    // description		
    // price		
    // id_teacher		
    // created_at		
    // updated_at		

    public function show($id){
        $course = Course::find($id);
        return $course;
    }
    public function list(Request $request){
        $data = Course::all();
        return $data;
    }

    public function create(CreateCourseRequest $request){
        $course = Course::create($request->all());
        return [
            "status" => 200,
            "data" => $course
        ];
    }

    public function update(UpdateCourseRequest $request){
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->level = $request->level;
        $course->method = $request->method;
        $course->description = $request->description ? $request->description : null;
        $course->price = $request->price;
        $course->id_teacher = $request->id_teacher;
        $course->save();

        return [
            "status" => 200,
            "data" => $course
        ];
    }

    public function destroy($id){
        $course = Course::find($id);
        $course->delete();

        return [
            "status" => 200
        ];
    }
}
