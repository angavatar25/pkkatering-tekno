<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'administrator';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'seller';
        $role_admin->description = 'seller';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'customer';
        $role_admin->description = 'customer';
        $role_admin->save();
    }
}
