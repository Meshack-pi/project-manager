<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donor; // Import the Donor model

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donor::insert([
            [
                'name' => 'UNICEF',
                'description' => 'United Nations International Children’s Emergency Fund',
            ],
            [
                'name' => 'WHO',
                'description' => 'World Health Organization',
            ],
            [
                'name' => 'Red Cross',
                'description' => 'Humanitarian aid organization',
            ],
            [
                'name' => 'World Bank',
                'description' => 'International financial institution',
            ],
            [
                'name' => 'IMF',
                'description' => 'International Monetary Fund',
            ],
        ]);
    }
}
