<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'index project',
            'create project',
            'show project',
            'edit project',
            'delete project',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }


        $student = Role::firstOrCreate(['name' => 'student']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $admin   = Role::firstOrCreate(['name' => 'admin']);



        $student->givePermissionTo([
            'index project',
            'create project',
            'show project',
            'edit project',
        ]);

        $teacher->givePermissionTo([
            'index project',
            'create project',
            'show project',
            'edit project',
            'delete project',
        ]);

        $admin->givePermissionTo(Permission::all());
    }
}
