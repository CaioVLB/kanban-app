<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
          'name' => 'Caio Vitor Lima Brito',
          'cpf' => '99999999999',
          'email' => 'pvhcaiovitor10@gmail.com',
          'password' => Hash::make('admin@exclusivebee'),
          'company_id' => 1,
          'profile_id' => 1,
          'created_at' => now(),
          'updated_at' => now()
        ];

        User::create($user);
    }
}
