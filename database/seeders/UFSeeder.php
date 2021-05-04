<?php

namespace Database\Seeders;

use App\Models\UF;
use Illuminate\Database\Seeder;

class UFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UF::factory()
            ->count(4)
            ->create();
    }
}
