<?php

namespace App\Repositories;

use App\Data\UserData;
use App\Data\UserFilter;
use App\Models\User;

class UserRepository
{
    public function first(UserFilter $userFilter): ?User
    {
        return $this->findBy($userFilter)->first();
    }

    public function update(User $user, UserData $userData)
    {
        return $this->persist($user, $userData);
    }

    public function updatePassword(User $user, string $password)
    {
        $user->password = $password;

        $user->save();

        return $user;
    }

    private function findBy(UserFilter $userFilter)
    {
        return User::when($userFilter->email ?? false, function ($query, $email) {
            $query->where('email', $email);
        });
    }

    private function persist(User $user, UserData $userData)
    {
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->fill($userData->toArray());

        $user->save();

        return $user;
    }
}
