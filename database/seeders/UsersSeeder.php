<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'root', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'reseller', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // permission

        $root = User::create(['name' => 'root', 'email' => 'root@email.com', 'password' => bcrypt('password')]);
        $admin = User::create(['name' => 'admin', 'email' => 'admin@email.com', 'password' => bcrypt('password')]);
        $reseller = User::create(['name' => 'reseller', 'email' => 'reseller@email.com', 'password' => bcrypt('password')]);
        $customer = User::create(['name' => 'customer', 'email' => 'customer@email.com', 'password' => bcrypt('password')]);

        $root->assignRole('root');
        $admin->assignRole('admin');
        $reseller->assignRole('reseller');
        $customer->assignRole('customer');
    }
}
