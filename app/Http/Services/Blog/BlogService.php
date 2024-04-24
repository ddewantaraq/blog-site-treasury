<?php

namespace App\Http\Services\Blog;

use App\Http\Repositories\Blog\BlogRepositoryInterface;

class BlogService
{
    public function __construct(
        protected BlogRepositoryInterface $blogRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->blogRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->blogRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->blogRepository->delete($id);
    }

    public function all()
    {
        return $this->blogRepository->all();
    }
    
    public function find($id)
    {
        return $this->blogRepository->find($id);
    }

    public function findByUserId($userId)
    {
        return $this->blogRepository->findByUserId($userId);
    }

    public function findByCode($code)
    {
        return $this->blogRepository->findByCode($code);
    }
}