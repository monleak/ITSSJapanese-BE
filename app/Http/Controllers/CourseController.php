<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\CommentAndCourse;
use Hamcrest\Collection\IsEmptyTraversable;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Constraint\IsEmpty;

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
    public function myCourse(Request $request){
        $input = $request->all();
        if(Auth::user()->role=='teacher'){
            if(empty($input) || array_key_exists('search', $input)){
                return view('teacher.mycourse', [
                    // 'listings' => Listing::all()
                    'listings' => Course::latest()->filter(request(['search']))->get()
                ]);
            }else{
                return view('teacher.mycourse', [
                    // 'listings' => Listing::all()
                    'listings' => Course::latest()->filter($input)->get()
                ]);
            }
        }else{
            return view('student.mycourse');
        }

    }
    public function index(Request $request)
    {
        // if(isset(Auth::user()->role)&&(Auth::user()->role == 'teacher')){
        //     return view('course.course-index',[
        //         'listings'=> Course::latest()->filter(request(['search']))->get()
        //     ]);
        // }
        // // dd($request->tag);
        // else{
        $input = $request->all();
        if(empty($input) || array_key_exists('search', $input)){
            return view('course.course-index', [
                'listings' => Course::latest()->filter(request(['search']))->get()
            ]);
        }else{
            return view('course.course-index', [
                'listings' => Course::latest()->filter($input)->get()
            ]);
        }
        
    }
    // Show single course
    public function show(Course $listing)
    {   
        $comments = CommentAndCourse::where('id_course',$listing->id)->latest()->paginate(3);
        return view('course.show', [
            //variable_name => values
            'listing' => $listing,
            'comments' => $comments
        ]);
    }
    public function create()
    {
        return(view('course.create'));
    }
    public function list(Request $request)
    {
        $data = Course::all();
        return $data;
    }



    public function store(Request $request) {

        $formField = $request->validate([
            'course_name' => Rule::unique('courses', 'name'),
        ]);
        Course::create([
            'name' => $_POST['course_name'] ,
            'teacher_id' => $_POST['teacher_id'],
            'level' => $_POST['course_level'],
            'method' =>  ($_POST['course_method'] == 'online' ? 'online' : 'offline'),
            'introduction' => $_POST['course_intro'],
            'description' => $_POST['course_description'],
            'price'=>$_POST['course_price']?$_POST['course_price']:0,
        ]);        

        return redirect('/course')->with('message', 'コース作成は成功でした !');
    }

    public function update(UpdateCourseRequest $request)
    {
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

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return [
            "status" => 200
        ];
    }
}