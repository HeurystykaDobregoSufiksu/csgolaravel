<?php


namespace App\Services;


use App\Repositories\UserRepository;


class UserService
{
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    public function getUserData()
    {
        return $this->user->getUserData();
    }


}
