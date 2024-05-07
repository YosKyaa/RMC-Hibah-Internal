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
    
            $role_lecture = Role::create(['name' => 'lecture','color' => '#3490dc','description' => 'lecture only']);
            $role_admin = Role::create(['name' => 'admin', 'color' => '##000000','description' => 'administator']);
    
            $lecture->assignRole('lecture');
            $admin->assignRole('admin');

    }
}
