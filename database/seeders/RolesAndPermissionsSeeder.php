<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = [
            'User',
            'Room',
            'Role',
            'Permission',
        ];

        $crudOperations = ['create', 'read', 'update', 'delete'];
        foreach ($models as $model) {
            foreach ($crudOperations as $operation) {
                Permission::create(['name' => Str::lower($operation . ' ' . Str::plural(Str::snake($model)))]);
            }
        }

        Permission::create(['name' => 'access dashboard']);
        Permission::create(['name' => 'accept booking']);
        Permission::create(['name' => 'reject booking']);

        $role = Role::create(['name' => 'employee']);
        $role->givePermissionTo(['accept booking', 'reject booking', 'access dashboard']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


        $employee = User::create([
            'name' => 'Employee User',
            'email' => 'employee@mail.com',
            'password' => bcrypt('password'),
        ]);
        $employee->assignRole('employee');

        $superAdmin = User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('super-admin');
    }
}
