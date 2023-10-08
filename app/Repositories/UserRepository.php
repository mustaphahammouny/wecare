<?php

namespace App\Repositories;

use App\Enums\ProviderList;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    public function first(array $filter): ?User
    {
        return $this->findBy($filter)->first();
    }

    public function store(array $data, ProviderList $provider = null)
    {
        $user = new User();

        $newData['first_name'] = $data['given_name'];
        $newData['last_name'] = $data['family_name'];
        $newData['email'] = $data['email'];

        if ($provider) {
            $newData['provider_name'] = $provider->value;
            $newData['provider_id'] = $data['id'];
            $newData['email_verified_at'] = Carbon::now();
            $newData['password'] = Hash::make(Str::random(8));
        }

        return $this->persist($user, $newData);
    }

    public function update(User $user, array $data)
    {
        return $this->persist($user, $data);
    }

    public function updatePassword(User $user, array $data)
    {
        return $this->persist($user, [
            'password' => Hash::make($data['password']),
        ]);
    }

    private function findBy(array $filter)
    {
        return User::when($filter['email'] ?? false, function ($query, $email) {
            $query->where('email', $email);
        });
    }

    private function persist(User $user, array $data)
    {
        try {
            DB::beginTransaction();

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->fill($data);

            $user->save();

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
