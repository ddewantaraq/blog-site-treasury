<?php

namespace App\Http\Controllers\Blog;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;

use App\Models\Blog;

class DeleteController extends Controller
{
    public function __construct(
        protected BlogService $blogService
      ) {
    }

    public function destroy(Blog $blog): RedirectResponse {
        Gate::authorize('update', $blog);

        try {
            $userId = Auth::id();

            $this->blogService->delete($blog->id);

            $blogs = $this->blogService->findByUserId($userId);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('blog.view', compact('blogs')))
        ->with('failed', 'Something wrong!');
        }
        return redirect(route('blog.view', compact('blogs')))
        ->with('success', 'Your blog has been deleted!');
    }
}
