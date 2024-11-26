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
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'name' => 'Manager',
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'name' => 'Collaborator',
            'created_at' => now(),
            'updated_at' => now()
          ]
        ];

        Profile::insert($profiles);
    }
}
