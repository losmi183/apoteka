<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Imunitet'
        ]);
        Category::create([
            'name' => 'BEBI&nbsp;PROGRAM'
        ]);
        Category::create([
            'name' => 'Mršavljenje'
        ]);
        Category::create([
            'name' => 'Kozmetika'
        ]);
        Category::create([
            'name' => 'Potencija'
        ]);
    }
}
