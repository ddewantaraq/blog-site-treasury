<?php

namespace App\Http\Controllers\Blog;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;
use App\Http\Requests\BlogUpdateRequest;

use App\Models\Blog;
use Throwable;

class UpdateController extends Controller
{
    public function __construct(
        protected BlogService $blogService
      ) {
    }

    public function show(Blog $blog): View {
        Gate::authorize('update', $blog);

        try {
            $blog = $this->blogService->findByCode($blog->code);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('blog.update', compact('blog')))
        ->with('failed', 'Something wrong!');
        }
        return view('blog.update', compact('blog'));
    }

    public function submit(BlogUpdateRequest $request, Blog $blog): RedirectResponse {
        Gate::authorize('update', $blog);

        $validated = $request->validated();
        try {
            $user = Auth::user();

            $data = [
                'title' => $request->title,
                'content' => $request->content
            ];

            $this->blogService->update($data, $blog->id);
            $blogs = $this->blogService->findByUserId($user->id);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('blog.update', compact('blog')))
        ->with('failed', 'Something wrong!');
        }
        return redirect(route('blog.view', compact('blogs')))
        ->with('success', 'Your blog has been updated!');
    }
}
