<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $admin = Role::create(['name' => 'admin']);
    $user = Role::create(['name' => 'user']);
    
    $permission = Permission::create(['name' => 'manage books']);
    $admin->givePermissionTo($permission);
}
}
