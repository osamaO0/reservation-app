<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        $roles = $this->roleService->getAll();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->userService->create($data);
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        $roles = $this->roleService->getAll();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->userService->update($id, $data);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->route('admin.users.index');
    }
}
