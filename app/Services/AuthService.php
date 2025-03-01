<?php

namespace App\Services;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(array $credentials): void
    {
        $email = Arr::get($credentials, 'email');

        $this->ensureIsNotRateLimited($email);

        if (!Auth::attempt(Arr::except($credentials, 'remember'), Arr::get($credentials, 'remember'))) {
            RateLimiter::hit($this->throttleKey($email));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($email));
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();
    }

    private function ensureIsNotRateLimited(string $email): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($email), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey($email));

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    private function throttleKey(string $email): string
    {
        return Str::transliterate(Str::lower($email) . '|' . request()->ip());
    }
}
