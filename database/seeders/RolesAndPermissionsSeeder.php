<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'create-post',
            'edit-post',
            'delete-post',
            'view-post',
            'create-user',
            'edit-user',
            'delete-user',
            'view-user',
            'create-comment',
            'edit-comment',
            'delete-comment',
            'view-comment',
            'create-role',
            'edit-role',
            'delete-role',
            'view-role',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'view-permission',
            // Add more permissions as needed
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Define roles and assign permissions
        $roles = [
            'super-admin' => [
                'create-post',
                'edit-post',
                'delete-post',
                'view-post',
                'create-user',
                'edit-user',
                'delete-user',
                'view-user',
                'create-comment',
                'edit-comment',
                'delete-comment',
                'view-comment',
                'create-role',
                'edit-role',
                'delete-role',
                'view-role',
                'create-permission',
                'edit-permission',
                'delete-permission',
                'view-permission',
            ],
            'admin' => [
                'create-post',
                'edit-post',
                'delete-post',
                'view-post',
                'create-user',
                'edit-user',
                'delete-user',
                'view-user',
                'create-comment',
                'edit-comment',
                'delete-comment',
                'view-comment',
            ],
            'user' => [
                'view-post',
                'view-user',
                'create-comment',
                'view-comment',
            ]
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }
    }
}
