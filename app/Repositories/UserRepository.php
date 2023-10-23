<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\RegisterData;
use App\Data\UserData;
use App\Data\UserFilter;
use App\Enums\RoleList;
use App\Models\User;

class UserRepository
{
    public function paginate(?UserFilter $userFilter)
    {
        return $this->findBy($userFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function first(UserFilter $userFilter): ?User
    {
        return $this->findBy($userFilter)->first();
    }

    public function count(?UserFilter $userFilter): int
    {
        return $this->findBy($userFilter)->count();
    }

    public function store(RegisterData $registerData)
    {
        $user = new User();

        $user->fill($registerData->toArray());

        $user->role = RoleList::Client->value;

        $user->save();

        return $user;
    }

    public function update(User $user, UserData $userData)
    {
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->fill($userData->toArray());

        $user->save();

        return $user;
    }

    public function updatePassword(User $user, string $password)
    {
        $user->password = $password;

        $user->save();

        return $user;
    }

    private function findBy(?UserFilter $userFilter)
    {
        return User::when($userFilter->email ?? false, function ($query, $email) {
            $query->where('email', $email);
        })
            ->when($userFilter->role ?? false, function ($query, $role) {
                $query->where('role', $role->value);
            });
    }
}
