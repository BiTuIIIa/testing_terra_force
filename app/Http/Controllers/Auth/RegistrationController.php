<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('user.home'));
        }
        return view('auth.registration');
    }

    public function registration(RegistrationRequest $request): RedirectResponse
    {
        $validateFields = $request->validated();
        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('auth.index.registration'))->withErrors([
                'email' => 'User with this email is registered'
            ])->withInput();
        }

        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.home'));
        }

        return redirect(route('auth.registration'))->withErrors(['formError' => 'There was an error saving the user']);
    }
}
