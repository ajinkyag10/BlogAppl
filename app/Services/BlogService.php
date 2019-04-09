<?php

namespace App\Services;
use App\Repositories\BlogRepository;


class BlogService
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository){
       
        $this->blogRepository = $blogRepository;
    }

    public function index(){
        return $this->blogRepository->list();
    }

    public function createBlog($request){
        $input=$request->all();

        $inputsArray=[
            'title' => $input['title'],
            'description' => $input['description']
        ];
        return $this->blogRepository->createBlog($inputsArray);
    }

    public function getBlogDetails($id){
        return $this->blogRepository->getBlog($id);
    }
}