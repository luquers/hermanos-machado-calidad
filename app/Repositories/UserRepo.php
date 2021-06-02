<?php


namespace App\Repositories;


class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User();
    }
}