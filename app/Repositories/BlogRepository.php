<?php

namespace App\Repositories;
use App\Models\Blog;


class BlogRepository 
{
  

    public function __construct(Blog $blog){
        
        $this->blog = $blog;
    }

    public function list(){

        return $this->blog->orderBy('created_at','DESC')->get();
    }

    public function createBlog($inputsArray){
        return $this->blog->create($inputsArray);
    }

    public function getBlog($id){
        return $this->blog->find($id);
    }
}