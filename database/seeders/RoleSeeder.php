<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin', 'permissions' => json_encode(['create', 'edit', 'delete'])]);
        Role::create(['name' => 'Vendor', 'permissions' => json_encode(['view'])]);
    }
}
