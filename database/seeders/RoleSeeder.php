<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Reset Cached Roles & Permissions
        |--------------------------------------------------------------------------
        |
        | Membersihkan cache Spatie agar perubahan role langsung terbaca.
        |
        */

        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        /*
        |--------------------------------------------------------------------------
        | Create Roles
        |--------------------------------------------------------------------------
        */

        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::firstOrCreate([
            'name' => 'peserta',
            'guard_name' => 'web',
        ]);
    }
}