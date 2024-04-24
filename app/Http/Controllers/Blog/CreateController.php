<?php

namespace App\Http\Controllers\Blog;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;
use App\Http\Services\UtilService;
use App\Http\Requests\BlogCreateRequest;
use Throwable;

class CreateController extends Controller
{
    public function __construct(
        protected BlogService $blogService,
        protected UtilService $utilService,
      ) {
    }

    public function show(): View {
        return view('blog.create');
    }

    public function submit(BlogCreateRequest $request): RedirectResponse {
        $validated = $request->validated();
        try {
            $user = Auth::user();

            $code = $this->utilService->generateRandomString(10);
            $data = [
                'code' => strtoupper($code),
                'title' => $request->title,
                'status' => "active",
                'content' => $request->content,
                'user_id' => $user->id
            ];
            $this->blogService->create($data);
            $blogs = $this->blogService->findByUserId($user->id);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('blog.create'))
        ->with('failed', 'Something wrong!');
        }
        return redirect(route('blog.view', compact('blogs')))
        ->with('success', 'Your blog has been created!');
    }
}
