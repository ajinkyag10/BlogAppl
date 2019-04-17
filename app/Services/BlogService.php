<?php

namespace App\Services;
use App\Repositories\BlogRepository;
use App\Models\Blog;

class BlogService
{
    private $blogRepository;

    public function __construct(BlogRepository $blogRepository,Blog $blog){
       
        $this->blogRepository = $blogRepository;
        $this->blog = $blog;
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
    public function getBlogsDetails(Blog $blog){
        return $this->blogRepository->getBlogs($blog);
    }
    public function deleteBlog(Blog $blog){
        return $this->blogRepository->destroyBlog($blog);
    }
}