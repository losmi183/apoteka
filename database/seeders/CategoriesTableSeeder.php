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
            'name' => 'Imunitet',
            'slug' => 'imunitet'
            
        ]);
        Category::create([
            'name' => 'Bebi Program',
            'slug' => 'bebi-program'
        ]);
        Category::create([
            'name' => 'Mršavljenje',
            'slug' => 'mrsavljenje'
        ]);
        Category::create([
            'name' => 'Kozmetika',
            'slug' => 'kozmetika'
        ]);
        Category::create([
            'name' => 'Potencija',
            'slug' => 'potencija'
        ]);
        
            // Subcategories 
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'imunitet-vitamini',
                'parent_id' => 1
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'imunitet-minerali',
                'parent_id' => 1
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'imunitet-cajevi',
                'parent_id' => 1
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'bebi-program-vitamini',
                'parent_id' => 2
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'bebi-program-minerali',
                'parent_id' => 2
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'bebi-program-cajevi',
                'parent_id' => 2
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'mrsavljenje-vitamini',
                'parent_id' => 3
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'mrsavljenje-minerali',
                'parent_id' => 3
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'mrsavljenje-cajevi',
                'parent_id' => 3
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'kozmetika-vitamini',
                'parent_id' => 4
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'kozmetika-minerali',
                'parent_id' => 4
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'kozmetika-cajevi',
                'parent_id' => 4
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'potencija-vitamini',
                'parent_id' => 5
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'potencija-minerali',
                'parent_id' => 5
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'potencija-cajevi',
                'parent_id' => 5
            ]);        
    }
}
