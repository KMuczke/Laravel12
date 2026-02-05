<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        Permission::create(['name' => 'index task']);
        Permission::create(['name' => 'create task']);
        Permission::create(['name' => 'show task']);
        Permission::create(['name' => 'edit task']);
        Permission::create(['name' => 'delete task']);

        $student->givePermissionTo([
            'index task',
            'create task',
            'show task',
            'edit task',
            'delete task',
        ]);

        $teacher->givePermissionTo([
            'index task',
            'create task',
            'show task',
            'edit task',
            'delete task',
        ]);

        $admin->givePermissionTo([
            'index task',
            'create task',
            'show task',
            'edit task',
            'delete task',
        ]);
    }
}
