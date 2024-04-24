<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginPostRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function show(): View {
        return view('auth.login');
    }

    public function submit(LoginPostRequest $request): RedirectResponse {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
 
            return redirect(route('blog.view', absolute: false));
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
