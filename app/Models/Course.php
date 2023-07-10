<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'level',
        'method',
        'description',
        'price',
        'teacher_id',
    ];

    public function Teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function scopeFilter($query, array $filter){
        if(array_key_exists('search', $filter) || empty($filter)){
            // dd($query);
            // Find the teacher by name => user_id => teacher_id => course
            // DB::class returns a delequent model Collection
            /*
            Find courses by teacher's name
            */
            $userIdByName = DB::table("teachers")->select('id')->where('fullname','like','%'.request('search').'%')->get()->first();//get user_id from users table
            if(isset($userIdByName)){
                // $teacherIdByUserId = DB::table("teachers")->select('id')->where('user_id','like','%'.$userIdByName->id.'%')->get()->first();
                $query->where('teacher_id','like','%'.$userIdByName->id.'%');
            }else{
                /*
                Find course by name or description or price
                */
                $query->where('name','like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%')
                ->orWhere('price','like','%'.request('search').'%');
            }
        }else if($filter['level'] != '#' || $filter['exp'] != '#'  
        ||$filter['city'] != '#'  || $filter['price'] != '#' || array_key_exists('method',$filter)  ){
            if($filter['level'] != '#' ){
                $query->where('level','like',request('level'));
            }
            if($filter['exp'] != '#' ){
                $teacher = DB::table('teachers')->select('id')->whereRaw("experience".request('exp'))->get()->first();
                if(isset($teacher)){
                    $query->where('teacher_id',$teacher->id);
                }else{
                    $query->where('teacher_id',-1);
                }
            }
            if($filter['city'] != '#' ){
                $teacher = DB::table('teachers')->select('id')->where("designation",'like','%'.request('search').'%')->get()->first();
                $query->where('teacher_id','like',$teacher->id);
            }
            if($filter['price'] != '#' ){
                $query->whereRaw("price".request('price'));
            }
            if($filter['method'] == 'on'){
                $query->where('method','like','online');
            }else{
                $query->where('method','like','offline');
            }
        }
        // dd($filter);
        
    }
}
