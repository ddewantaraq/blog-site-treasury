<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Throwable;

class RegisterController extends Controller
{
    public function __construct(
        protected UserService $userService
      ) {
    }

    public function show(): View {
        return view('auth.register');
    }

    public function submit(RegisterPostRequest $request): RedirectResponse {
        $validated = $request->validated();

        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];

        try {
            $user = $this->userService->create($data);
            Auth::login($user);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect(route('register'))
        ->with('failed', 'Something wrong!');
        }

        return redirect(route('blog.view', absolute: false));
    }
}
