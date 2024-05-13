<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefix = ['view', 'create', 'edit', 'activation','delete'];
        $entities = ['role', 'user', 'city', 'region', 'major', 'advice','terms','contactUs','serviceProviders','admin'];

        foreach ($prefix as $action) {
            foreach ($entities as $entity) {
                $permissionName = "{$action} {$entity}";
                Permission::create(['name' => $permissionName]);
            }
        }
    }
}
