<?php

namespace Database\Seeders;

use App\Enums\ProfileEnum;
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
          'name' => 'admin',
          'cpf' => '99999999999',
          'email' => 'admin@exclusivebee.com',
          'password' => Hash::make('admin@exclusivebee'),
          'company_id' => 1,
          'profile_id' => ProfileEnum::ADMIN,
          'created_at' => now(),
          'updated_at' => now()
        ];

        User::create($user);
    }
}
