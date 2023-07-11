<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\CommentAndCourse;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => "Le Tuan Hung",
            'email' => "teacher@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'teacher'
        ]);
        User::create([
            'id' => 2,
            'name' => "Tran Minh Quan",
            'email' => "student@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'student'
        ]);
        User::create([
            'id' => 3,
            'name' => "Tuan Ngoc",
            'email' => "student2@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'student'
        ]);
        User::create([
            'id' => 4,
            'name' => "Van Hoa",
            'email' => "student3@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'student'
        ]);
        User::create([
            'id' => 5,
            'name' => "Quach Van Hoa",
            'email' => "teacher2@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'teacher'
        ]);
        User::create([
            'id' => 6,
            'name' => "Le Quoc Manh",
            'email' => "teacher3@gmail.com",
            'password' => Hash::make("123"),
            'role' => 'teacher'
        ]);
        Student::create([
            'id'=>2,
            'user_id'=>2,
            'email' => "student@gmail.com",
            'fullname' => 'Tran Minh Quan',
            'password' => '123',
            'designation' => 'Ha Noi'
        ]);
        Student::create([
            'id'=>3,
            'user_id'=>3,

            'email' => "student2@gmail.com",
            'fullname' => 'Tuan Ngoc',
            'password' => '123',
            'designation' => 'Ha Noi'
        ]);
        Student::create([
            'id'=>4,
            'user_id'=>4,
            'email' => "student3@gmail.com",
            'fullname' => 'Van Hoa',
            'password' => '123',
            'designation' => 'Ha Noi'
        ]);
        Teacher::create([
            'id' => 1,
            'user_id'=>1,
            'email' => 'teacher@gmail.com',
            'fullname' => 'Le Tuan Hung',
            'gender' => 'male',
            'password' => '123',
            'designation' => 'Ha Noi',
            'skills' => '',
            'experience' => '5',
            'description' => '
            HUSTの日本語教師
            年の指導経験
            N5からN1レベルのクラスを提供',
            'photo' => 'E:\20222\ITSS in Japanese\project-ichiichi\ITSSJapanese-BE\public\images\ava.png',
            'facebook'=>'facebook.com/ichisensei_hung_lt',
            'twitter'=>'twitter.com/ichisensei_hung_lt',
            'zalo'=>'zalo.me/ichisensei_hung_lt',
            'phoneNumber'=>'0123456789'
        ]);
        Teacher::create([
            'id' => 5,
            'user_id'=>5,
            'email' => 'teacher2@gmail.com',
            'fullname' => 'Quach Van Hoa',
            'gender' => 'male',
            'password' => '123',
            'designation' => 'Ha Noi',
            'skills' => '',
            'experience' => '2',
            'description' => '
            HUSTの日本語教師
            年の指導経験
            N5からN1レベルのクラスを提供',
            'photo' => 'E:\20222\ITSS in Japanese\project-ichiichi\ITSSJapanese-BE\public\images\ava.png',
            'facebook'=>'facebook.com/ichisensei_hoa_qv',
            'twitter'=>'twitter.com/ichisensei_hoa_qv',
            'zalo'=>'zalo.me/ichisensei_hoa_qv',
            'phoneNumber'=>'0123456666'
        ]);
        Teacher::create([
            'id' => 6,
            'user_id'=>6,
            'email' => 'teacher3@gmail.com',
            'fullname' => 'Le Quoc Manh',
            'gender' => 'male',
            'password' => '123',
            'designation' => 'Ha Noi',
            'skills' => '',
            'experience' => '10',
            'description' => '
            HUSTの日本語教師
            年の指導経験
            N5からN1レベルのクラスを提供',
            'photo' => 'E:\20222\ITSS in Japanese\project-ichiichi\ITSSJapanese-BE\public\images\ava.png',
            'facebook'=>'facebook.com/ichisensei_manh_lq',
            'twitter'=>'twitter.com/ichisensei_manh_lq',
            'zalo'=>'zalo.me/ichisensei_manh_lq',
            'phoneNumber'=>'01234567777'
        ]);
        Course::create([
            'id' => 1,
            "name" => '基本的なベトナム語',
            'description' => "これはベトナム語のアルファベットと基本的な言葉と発音を教えるコースです。",
            'teacher_id' => 1,
            'price' => 300000,
            'method' => 'Online',
            'level' => 'A'
        ]);

        Course::create([
            'id' => 2,
            "name" => '中級のベトナム語',
            'description' => "これは生活でよく使われる言葉と発音を教えるコースです。",
            'teacher_id' => 5,
            'price' => 600000,
            'method' => 'Online',
            'level' => 'B'
        ]);
        Course::create([
            'id' => 3,
            "name" => '高級のベトナム語',
            'description' => "これはCレベルを取得ために、行われるコースです。",
            'teacher_id' => 6,
            'price' => 2100000,
            'method' => 'Offline',
            'level' => 'C'
        ]);
        Course::create([
            'id' => 4,
            "name" => '一般的なベトナム語',
            'description' => "これは日常生活の良く使われたベトナム語の言葉のコースです。",
            'teacher_id' => 1,
            'price' => 500000,
            'method' => 'Online',
            'level' => 'A'
        ]);
        CommentAndCourse::create([
            'id'=>1,
            'id_student' => 3,
            'id_course'=> 1,
            'content'=> "いいコースだ。ベトナム語が良くなりました。",
            'rating'=>5
        ]);
        CommentAndCourse::create([
            'id'=>2,
            'id_student' => 2,
            'id_course'=> 1,
            'content'=> "初めてベトナム語を勉強する人に向いていると思います。",
            'rating'=>4
        ]);
        CommentAndCourse::create([
            'id'=>3,
            'id_student' => 3,
            'id_course'=> 2,
            'content'=> "いいコースだ。ベトナム語が良くなりました。",
            'rating'=>5
        ]);
        CommentAndCourse::create([
            'id'=>4,
            'id_student' => 2,
            'id_course'=> 2,
            'content'=> "初めてベトナム語を勉強する人に向いていると思います。",
            'rating'=>4
        ]);
        CommentAndCourse::create([
            'id'=>5,
            'id_student' => 3,
            'id_course'=> 3,
            'content'=> "いいコースだ。ベトナム語が良くなりました。",
            'rating'=>5
        ]);
        CommentAndCourse::create([
            'id'=>6,
            'id_student' => 2,
            'id_course'=> 3,
            'content'=> "初めてベトナム語を勉強する人に向いていると思います。",
            'rating'=>4
        ]);
    }
}