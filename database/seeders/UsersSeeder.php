<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

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
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'reseller', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'customer', 'created_at' => now(), 'updated_at' => now()],
        ]);

        User::insert([
            [
                'name'              => 'admin',
                'email'             => 'admin@email.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'role_id'           => 1,
                'jenis_kelamin'     => 'l',
                'tempat_lahir'      => null,
                'tgl_lahir'         => null,
                'alamat'            => null,
                'no_hp'             => '+6281234567890',
                'no_wa'             => '+6281234567890',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'reseller',
                'email'             => 'reseller@email.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'role_id'           => 2,
                'jenis_kelamin'     => 'p',
                'tempat_lahir'      => null,
                'tgl_lahir'         => null,
                'alamat'            => null,
                'no_hp'             => '+6281357924680',
                'no_wa'             => '+6281357924680',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'customer',
                'email'             => 'customer@email.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'role_id'           => 3,
                'jenis_kelamin'     => 'p',
                'tempat_lahir'      => null,
                'tgl_lahir'         => null,
                'alamat'            => null,
                'no_hp'             => '+6289876543210',
                'no_wa'             => '+6289876543210',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
