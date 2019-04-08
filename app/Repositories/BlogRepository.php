<?php

namespace App\Repositories;
use App\Models\Blog;

class BlogRepository extends Repository
{
    public function __construct(Blog $model){
        $this->model = $model;
    }

}