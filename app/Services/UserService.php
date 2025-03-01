<?php

namespace App\Services;

use App\Constants\General;
use App\Enums\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function paginate(array $filter = [])
    {
        return User::query()
            ->where('role', Role::Client)
            ->when(
                Arr::get($filter, 'email'),
                fn($query, $email) => $query->where('email', $email)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function store(array $data): User
    {
        $user = new User;

        return $this->persist($user, $data);
    }

    public function update(User $user, array $data): User
    {
        return $this->persist($user, $data);
    }

    public function updatePassword(User $user, string $password): User
    {
        return $this->persist($user, [
            'password' => Hash::make($password),
        ]);
    }

    private function persist(User $user, array $data): User
    {
        try {
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->fill($data);

            $user->save();

            return $user;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
