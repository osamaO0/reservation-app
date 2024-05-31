<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService extends BaseService
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function create(array $data)
    {
        $role = Role::create($data);
        $role->syncPermissions($data['permissions']);
        return $role;
    }

    public function update($id, $data)
    {
        $role = Role::find($id);
        $role->update($data);
        $role->syncPermissions($data['edit_permissions']);
        return $role;
    }
}
