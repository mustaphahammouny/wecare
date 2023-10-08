<?php

namespace App\Services;

use App\Enums\ProviderList;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function login(array $data): void
    {
        $this->ensureIsNotRateLimited($data['email']);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (!Auth::attempt($credentials, $data['remember'])) {
            RateLimiter::hit($this->throttleKey($data['email']));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($data['email']));

        // session()->regenerate();
    }

    public function loginWithSocials(ProviderList $provider, array $data)
    {
        try {
            DB::beginTransaction();

            $user = $this->userRepository->first(['email' => $data['email']]);

            if (!$user) {
                $user = $this->userRepository->store($data, $provider);
            }

            DB::commit();

            Auth::login($user);
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();

        // session()->invalidate();

        // session()->regenerateToken();
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

    private function throttleKey($email): string
    {
        return Str::transliterate(Str::lower($email) . '|' . request()->ip());
    }
}
