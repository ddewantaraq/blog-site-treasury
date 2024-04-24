<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    /**
     * Determine if the given blog can be updated by the user.
     */
    public function update(User $user, Blog $blog): Response
    {
        return $user->id === $blog->user_id
                ? Response::allow()
                : Response::denyAsNotFound();
    }
}
