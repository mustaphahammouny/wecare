<?php

namespace App\Services;

use App\Data\LoginData;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function login(LoginData $loginData): void
    {
        $this->ensureIsNotRateLimited($loginData->email);

        $credentials = [
            'email' => $loginData->email,
            'password' => $loginData->password,
        ];

        if (!Auth::attempt($credentials, $loginData->remember)) {
            RateLimiter::hit($this->throttleKey($loginData->email));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($loginData->email));
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
