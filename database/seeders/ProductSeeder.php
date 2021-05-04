<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = DB::table('category')->insertGetId([
            'name' => 'limpeza'
        ]);

        DB::table('product')->insert([
            'name' => 'Sabão em Po',
            'quantity' => 2,
            'category_id' => $categoryId
        ]);

        DB::table('product')->insert([
            'name' => 'Sabão Liquido',
            'quantity' => 5,
            'category_id' => $categoryId
        ]);
    }
}
