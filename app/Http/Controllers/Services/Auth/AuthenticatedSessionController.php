<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\Auth\ServiceRequest;
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
        return view('service.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('services.dashboard.index',app()->getLocale()));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('service_provider')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('website.welcome');
    }
}
