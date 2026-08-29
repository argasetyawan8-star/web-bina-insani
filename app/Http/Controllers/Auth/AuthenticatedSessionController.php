<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Authenticate User
        |--------------------------------------------------------------------------
        */

        $request->authenticate();

        /*
        |--------------------------------------------------------------------------
        | Regenerate Session
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | Get Authenticated User
        |--------------------------------------------------------------------------
        */

        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Admin Redirect
        |--------------------------------------------------------------------------
        |
        | Admin selalu diarahkan ke dashboard admin.
        |
        */

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | Participant Redirect
        |--------------------------------------------------------------------------
        |
        | Untuk peserta, Laravel akan mencoba mengembalikan user
        | ke halaman yang sebelumnya membutuhkan login.
        |
        | Contoh:
        |
        | /pendaftaran/1
        |       ↓
        | /login
        |       ↓
        | login berhasil
        |       ↓
        | /pendaftaran/1
        |
        */

        return redirect()->intended(route('home'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        /*
        |--------------------------------------------------------------------------
        | Invalidate Session
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();

        /*
        |--------------------------------------------------------------------------
        | Regenerate CSRF Token
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}