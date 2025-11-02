<?php

namespace App\Repositories\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    public function create(array $data):bool{
        $user = new User();
        $user->fill([
            User::NAME => $data[User::NAME],
            User::EMAIL => $data[User::EMAIL],
            User::USERNAME => $data[User::USERNAME],
            User::PASSWORD => bcrypt($data[User::PASSWORD])
        ]);
        return $user->save();

    }

    public function find(int $id):object{
        return User::find($id);

    }
}
