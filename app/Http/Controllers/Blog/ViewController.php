<?php

namespace App\Http\Controllers\Blog;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;
use Throwable;

class ViewController extends Controller
{
    public function __construct(
        protected BlogService $blogService
      ) {
    }

    public function all(): View {
        try {
            $blogs = $this->blogService->all();
            $count = collect($blogs)->count();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('welcome'))
        ->with('failed', 'Something wrong!');
        }

        return view('welcome', compact('blogs', 'count'));
    }

    public function detail($blogId): View {
        try { 
            $blog = $this->blogService->find($blogId);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('welcome'))
        ->with('failed', 'Something wrong!');
        }
        return view('blog.detail', compact('blog'));
    }

    public function show(): View {
        try {
            $userId = Auth::id();
            $blogs = $this->blogService->findByUserId($userId);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('welcome'))
        ->with('failed', 'Something wrong!');
        }
        return view('blog.index', compact('blogs'));
    }
}
