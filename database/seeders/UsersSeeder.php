<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
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
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'reseller']);
        Role::create(['name' => 'customer']);

        $admin = User::create([
            'email'        => 'admin@email.com',
            'email_verified_at' => now(),
            'password'     => Hash::make('password'),
            'nik'          => '6404054404450004',
            'nama_lengkap' => 'Administrator',
            'jk'           => 'l',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir'    => '1999-08-14',
            'alamat'       => 'Jl. Kulintang No. 33 RT 36 Samarinda',
            'no_hp'        => '081234567890',
            'no_wa'        => '081234567890',
        ]);

        $reseller = User::create([
            'email'        => 'reseller@email.com',
            'email_verified_at' => now(),
            'password'     => Hash::make('password'),
            'nik'          => '6444044554050005',
            'nama_lengkap' => 'Reseller Rime Syari',
            'jk'           => 'p',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir'    => '1999-08-14',
            'alamat'       => 'Jl. Kulintang No. 33 RT 36 Samarinda',
            'no_hp'        => '089876543210',
            'no_wa'        => '089876543210',
        ]);

        $customer = User::create([
            'email'        => 'customer@email.com',
            'email_verified_at' => now(),
            'password'     => Hash::make('password'),
            'nik'          => '6544500454050006',
            'nama_lengkap' => 'Customer Rime Syari',
            'jk'           => 'p',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir'    => '1999-08-14',
            'alamat'       => 'Jl. Kulintang No. 33 RT 36 Samarinda',
            'no_hp'        => '082123456789',
            'no_wa'        => '082123456789',
        ]);

        $admin->assignRole('admin');
        $reseller->assignRole('reseller');
        $customer->assignRole('customer');
    }
}
