<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Admin']);

        $user = User::findOrFail(1);

        $user->givePermissionTo('Admin');
    }
}
