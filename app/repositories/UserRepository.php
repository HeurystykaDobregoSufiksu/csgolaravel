<?php


namespace App\repositories;
use App\User;
use Auth;
class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUserData()
    {

        return User::where('id', '=', Auth::user()->id)->first();
    }

}
