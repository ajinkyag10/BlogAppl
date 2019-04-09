<?php

namespace App\Http\Controllers;
use App\Services\CommentsService;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $commentsService;

    public function __construct(CommentsService $commentsService){
        $this->commentsService = $commentsService;

    }



    public function store(Request $request){
        request()->validate([
            
            'name'=>['required'],
            'email'=>['required'],
            'comment'=>['required','min:5','max:50']
        ]);
        $result = $this->commentsService->createComment($request);
            if ($result) {
               return back();
            } else {
               echo "error";
            }
    }
};
