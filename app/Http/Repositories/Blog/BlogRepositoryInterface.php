<?php

namespace App\Http\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findByUserId($userId);

    public function findByCode($code);
}