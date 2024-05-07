<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use DB;
use App\Models\User;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => bcrypt('adminadmin')
        ];

        // DB::beginTransaction();
        // try {
            $lecture = User::create(array_merge([
                'email' => 'jhosuakristiawan123@gmail.com',
                'name' => 'lecture',
                'username' => 'lecture',
            ], $default_user_value));
    
            $admin = User::create(array_merge([
                'email' => 'no-reply@jgu.ac.id',
                'name' => 'admin',
                'username' => 'admin',
            ], $default_user_value));

            $reviewer = User::create(array_merge([
                'email' => 'reviewer@gmail.com',
                'name' => 'reviewer',
                'username' => 'reviewer',
            ], $default_user_value));

            $reviewer = User::create(array_merge([
                'email' => 'warek1@gmail.com',
                'name' => 'warek1',
                'username' => 'warek1',
            ], $default_user_value));

            $reviewer = User::create(array_merge([
                'email' => 'warek2@gmail.com',
                'name' => 'warek2',
                'username' => 'warek2',
            ], $default_user_value));
    
            $role_lecture = Role::create(['name' => 'lecture','color' => '#3490dc','description' => 'lecture only']);
            $role_admin = Role::create(['name' => 'admin', 'color' => '##000000','description' => 'administator']);
            $role_reviewer = Role::create(['name' => 'reviewer', 'color' => '#38c172','description' => 'reviewer']);
            $role_warek1 = Role::create(['name' => 'warek1', 'color' => '#2112dc','description' => 'warek1']);
            $role_warek2 = Role::create(['name' => 'warek2', 'color' => '#5233dc','description' => 'warek2']);
    
            $lecture->assignRole('lecture');
            $admin->assignRole('admin');
            $reviewer->assignRole('reviewer');
            $reviewer->assignRole('warek1');
            $reviewer->assignRole('warek2');

    }
}
