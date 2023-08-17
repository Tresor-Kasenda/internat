<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'create',
            'read',
            'update',
            'delete',
        ])->each(fn($permission) => Permission::create(['name' => $permission]));
    }
}
