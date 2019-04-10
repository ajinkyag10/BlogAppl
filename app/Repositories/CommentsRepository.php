<?php

namespace App\Repositories;
use App\Models\Comments;

class CommentsRepository 
{
        private $comments;
        public function __construct(Comments $comments){
        
        $this->comments = $comments;
    }

    public function createComment($insertArray){
      
        return $this->comments->create($insertArray);
    }

    public function getBlogComments($id)

    {
       
        return $this->comments->where('blog_id', $id)->orderBy('id','DESC')->get();
    }
}