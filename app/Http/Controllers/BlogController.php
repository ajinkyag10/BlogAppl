<?php

namespace App\Http\Controllers;
use App\Services\BlogService;
use App\Services\CommentsService;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository;

class BlogController extends Controller
{
    private $blogService;
    private $commentsService;

    public function __construct(BlogService $blogService,CommentsService $commentsService){
        $this->blogService = $blogService;
       $this->commentsService = $commentsService;
        //  $this->middleware('auth');

    }

    public function home(){
       
        $blogslist=$this->blogService->index();
       
        
        return view('/blogs.index',compact('blogslist'));
       
    }


    public function addBlog(){
        return view('/blogs.create');
    }

    public function store(Request $request){
        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3','max:500']
        ]);
        $result = $this->blogService->createBlog($request);
        if($result){
            return redirect('/blogs');
        }
        else{
            echo"Error";
        }
    }
    public function details($id){
        dd($id);
        $blogdetails=$this->blogService->getBlogDetails($id);
        
        $comments = $this->commentsService->getBlogComments($id);
        
        return view('/blogs.show', compact('blogdetails','comments')); 
    }

}
