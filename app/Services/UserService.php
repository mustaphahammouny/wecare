<?php

namespace App\Services;

use App\Data\RegisterData;
use App\Data\Userdata;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function store(RegisterData $registerData)
    {
        try {
            DB::beginTransaction();

            $user = $this->userRepository->store($registerData);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function update(User $user, Userdata $Userdata)
    {
        try {
            DB::beginTransaction();

            $booking = $this->userRepository->update($user, $Userdata);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function updatePassword(User $user, string $password)
    {
        try {
            DB::beginTransaction();

            $password = Hash::make($password);

            $booking = $this->userRepository->updatePassword($user, $password);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
