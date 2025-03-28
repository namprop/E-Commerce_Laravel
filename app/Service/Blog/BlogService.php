<?php

namespace App\Service\Blog;
use App\Service\BaseService;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;

    public function __construct(BlogRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getLatesBlogs($limit = 3){
        return $this->repository->getLatesBlogs($limit);
    }
}