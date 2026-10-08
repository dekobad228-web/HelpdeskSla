<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Models\User;
use Throwable;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('profile.index');
        }

        return view('profile.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        try {
            User::create([
                'role' => 'admin',
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);
        } catch (UniqueConstraintViolationException) {
            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->withErrors(['email' => 'Такой email уже зарегистрирован']);
        } catch (Throwable $e) {
            Log::error('Ошибка создания пользователя', ['exception' => $e]);

            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('error', 'Критическая ошибка! Пользователь не создан.');
        }

        return redirect()
            ->route('profile.index')
            ->with('success', 'Пользователь создан');
    }
}
