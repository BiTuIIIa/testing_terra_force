<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('welcome'));
    }
}
