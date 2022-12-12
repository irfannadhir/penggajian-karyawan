<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'            => 'Admin Payroll',
                'tgl_masuk_kerja' => date('Y-m-d'),
                'jenis_kelamin'   => 'P',
                'tempat_lahir'    => 'Tangerang',
                'tanggal_lahir'   => '1990-10-01',
                'alamat'          => 'Tangerang',
                'no_hp'           => '0818181818181',
                'role'            => 'admin payroll',
                'email'           => 'adminpayroll@gmail.com',
                'nik'             => 111,
                'password'        => bcrypt('password'),
            ],
            [
                'name'            => 'Budi',
                'tgl_masuk_kerja' => date('Y-m-d'),
                'jenis_kelamin'   => 'L',
                'tempat_lahir'    => 'Tangerang',
                'tanggal_lahir'   => '1990-10-01',
                'alamat'          => 'Tangerang',
                'no_hp'           => '0818181818181',
                'role'            => 'karyawan borongan',
                'email'           => 'budi@gmail.com',
                'nik'             => 222,
                'password'        => bcrypt('password'),
            ],
            [
                'name'            => 'Admin Produksi',
                'tgl_masuk_kerja' => date('Y-m-d'),
                'jenis_kelamin'   => 'L',
                'tempat_lahir'    => 'Tangerang',
                'tanggal_lahir'   => '1990-10-01',
                'alamat'          => 'Tangerang',
                'no_hp'           => '0818181818181',
                'role'            => 'admin produksi',
                'email'           => 'adminproduksi@gmail.com',
                'nik'             => 333,
                'password'        => bcrypt('password'),
            ],
            [
                'name'            => 'Admin Keuangan',
                'tgl_masuk_kerja' => date('Y-m-d'),
                'jenis_kelamin'   => 'P',
                'tempat_lahir'    => 'Tangerang',
                'tanggal_lahir'   => '1990-10-01',
                'alamat'          => 'Tangerang',
                'no_hp'           => '0812333112312',
                'role'            => 'keuangan',
                'email'           => 'adminkeuangan@gmail.com',
                'nik'             => 444,
                'password'        => bcrypt('password'),
            ],
        ]);
    }
}
