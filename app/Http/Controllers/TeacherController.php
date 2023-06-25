<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // id		
    // email		
    // fullname		
    // gender		
    // password		
    // designation		
    // skills		
    // experience		
    // description		
    // photo		
    // created_at		
    // updated_at		

    public function show($id){
        $teacher = Teacher::find($id);
        return $teacher;
    }
    public function list(Request $request){
        $data = Teacher::all();
        return $data;
    }

    public function create(CreateTeacherRequest $request){
        $teacher = new Teacher;
        $teacher->email = $request->email;
        $teacher->fullname = $request->fullname;
        $teacher->gender = $request->gender;
        $teacher->password = $request->password;
        $teacher->designation = $request->designation;
        $teacher->skills = $request->skills;
        $teacher->experience = $request->experience;
        $teacher->description = $request->description;
        $teacher->photo = $request->photo;
        $teacher->save();
        return $teacher;
    }

    public function update(UpdateTeacherRequest $request){
        $teacher = Teacher::find($request->id);
        $teacher->email = $request->email;
        $teacher->fullname = $request->fullname;
        $teacher->gender = $request->gender;
        $teacher->password = $request->password;
        $teacher->designation = $request->designation;
        $teacher->skills = $request->skills;
        $teacher->experience = $request->experience;
        $teacher->description = $request->description;
        $teacher->photo = $request->photo;
        $teacher->save();

        return $teacher;
    }

    public function destroy($id){
        $teacher = Teacher::find($id);
        if($teacher){
            $teacher->delete();
            return "done";
        }else{
            return "khong tim thay";
        }
    }
}
