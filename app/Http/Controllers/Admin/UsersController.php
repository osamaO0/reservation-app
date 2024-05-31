<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\StoreUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
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

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $this->userService->create($data);
        session()->flash('success', 'User created successfully');
        return redirect()->route('users.index');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $this->userService->update($id, $data);
        session()->flash('success', 'User updated successfully');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        session()->flash('success', 'User deleted successfully');
        return redirect()->route('users.index');
    }
}
