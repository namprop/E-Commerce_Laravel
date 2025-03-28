<?php

namespace App\Service\Blog;
use App\Repositories\Blog\BlogRepositoryInterface;

interface BlogServiceInterface
{
    public function getLatesBlogs($limit = 3);
}