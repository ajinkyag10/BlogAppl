<?php

namespace App\Services;
Use App\Repositories\CommentsRepository;


class CommentsService
{
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepository){     
       
        $this->commentsRepository = $commentsRepository;
    
    }
    
    public function createComment($request,$id){
     
        $input = $request->all();  
       
        $insertArray = [
            'blog_id'=>$id,
            'name' =>  $input['name'],
            'email' =>  $input['email'], 
            'comment' =>  $input['comment'],
        ];
        
    
        return $this->commentsRepository->createComment($insertArray);
    } 
    
    public function getBlogComments($id)
    {
        
        return $this->commentsRepository->getBlogComments($id);

    }
    }
