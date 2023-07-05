<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request){
        return(view('comment.create'));
    }
    //
}
