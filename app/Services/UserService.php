<?php

namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(array $data)
    {
        $user = User::create($data);
        $user->assignRole($data['roles']);
        return $user;
    }

    public function update($id, $data)
    {
        $user = User::find($id);
        $user->update($data);
        $user->syncRoles($data['edit_roles']);
        return $user;
    }
}
