<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nik' => '123',
            'name' => 'Handika Kristofan',
            'email' => 'admin@siponi.com',
            'phone_number' => '08234567890',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'birth_date' => now(),
            'gender' => 'male',
            'address' => 'Mojokerto, Jawa Timur, Indonesia',
            'category' => 'staff',
        ]);

        $admin->assignRole('admin');

        $staff = User::create([
            'nik' => '456',
            'name' => 'Afid Rakhma Dianita',
            'email' => 'dianita@siponi.com',
            'phone_number' => '08234567890',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'birth_date' => now(),
            'gender' => 'female',
            'address' => 'Mojokerto, Jawa Timur, Indonesia',
            'category' => 'rm',
        ]);

        $staff->assignRole('staff');

        $patient = User::create([
            'nik' => '789',
            'name' => 'Budi',
            'email' => 'budiman@gmail.com',
            'phone_number' => '08234567890',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'birth_date' => now(),
            'gender' => 'male',
            'address' => 'Mojokerto, Jawa Timur, Indonesia',
            'category' => 'new',
        ]);

        $patient->assignRole('patient');
    }
}
