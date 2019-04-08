<?php

namespace App\Repositories;
use App\User;

class BlogRepository extends Repository
{
    public function __construct(User $model){
        $this->model = $model;
    }

}