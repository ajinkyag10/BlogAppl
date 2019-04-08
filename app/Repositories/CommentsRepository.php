<?php

namespace App\Repositories;
use App\Models\Comments;

class CommentsRepository extends Repository
{
    public function __construct(Comments $model){
        $this->model = $model;
    }

}