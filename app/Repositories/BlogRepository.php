<?php

namespace App\Repositories;
use App\Models\Blog;


class BlogRepository 
{
  

    public function __construct(Blog $blog){
        
        $this->blog = $blog;
    }

    public function list(){

        return $this->blog->orderBy('created_at','DESC')->paginate(4);
    }

    public function createBlog($inputsArray){
        return $this->blog->create($inputsArray);
    }

    public function getBlog($id){
        return $this->blog->find($id);
    }
    public function getBlogs($blog){
        
        $blog->update(request(['title','description']));
        return $this->blog->find($blog->id);
    }

    public function destroyBlog($blog){
        $blog=Blog::findOrFail($blog->id);
        $blog->delete();
        return $this->blog->delete();
    }
}