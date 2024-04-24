<?php

namespace App\Http\Repositories\Blog;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::all();
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function update(array $data, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }

    public function find($id)
    {
        return Blog::findOrFail($id);
    }

    public function findByUserId($userId) {
        return Blog::where('user_id', $userId)->get();
    }

    public function findByCode($code) {
        return Blog::where('code', $code)->first();
    }
}