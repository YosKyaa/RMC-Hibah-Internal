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
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin', // add this line
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $lecture = User::create([
            'name' => 'dosen',
            'username' => 'dosen', // add this line
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    
            $role_lecture = Role::create(['name' => 'lecture']);
            $role_admin = Role::create(['name' => 'admin']);
    
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
            Permission::create(['name' => 'read konfigurasi']);

            $role_admin->givePermissionTo('read role');
            $role_admin->givePermissionTo('create role');
            $role_admin->givePermissionTo('update role');
            $role_admin->givePermissionTo('delete role');
            $role_admin->givePermissionTo('read konfigurasi');
    
            $lecture->assignRole('lecture');
            $admin->assignRole('admin');

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }
        
        

    }
}
