<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Monthly',
            'duration' => 30,
            'price' => 1,
            'currency' => 'PHP',
        ]);

        Plan::create([
            'name' => 'Quarterly',
            'duration' => 90,
            'price' => 90,
            'currency' => 'PHP',
        ]);

        Plan::create([
            'name' => 'Yearly',
            'duration' => 365,
            'price' => 365,
            'currency' => 'PHP',
        ]);
    }
}
