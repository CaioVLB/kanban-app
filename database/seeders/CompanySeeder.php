<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = [
          'name' => 'Exclusive Bee',
          'hire_date' => now(),
          'active' => true,
          'created_at' => now(),
          'updated_at' => now()
        ];

        Company::create($company);
    }
}
