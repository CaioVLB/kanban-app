<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
          [
            'profile' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'profile' => 'Manager',
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'profile' => 'Collaborator',
            'created_at' => now(),
            'updated_at' => now()
          ]
        ];

        Profile::insert($profiles);
    }
}
