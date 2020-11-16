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
            'slug' => 'mršavljenje'
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
                'slug' => 'vitamini',
                'parent_id' => 1
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'minerali',
                'parent_id' => 1
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'cajevi',
                'parent_id' => 1
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'vitamini',
                'parent_id' => 2
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'minerali',
                'parent_id' => 2
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'cajevi',
                'parent_id' => 2
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'vitamini',
                'parent_id' => 3
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'minerali',
                'parent_id' => 3
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'cajevi',
                'parent_id' => 3
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'vitamini',
                'parent_id' => 4
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'minerali',
                'parent_id' => 4
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'cajevi',
                'parent_id' => 4
            ]);        
            Category::create([
                'name' => 'Vitamini',
                'slug' => 'vitamini',
                'parent_id' => 5
            ]);
            Category::create([
                'name' => 'Minerali',
                'slug' => 'minerali',
                'parent_id' => 5
            ]);
            Category::create([
                'name' => 'Čajevi',
                'slug' => 'cajevi',
                'parent_id' => 5
            ]);        
    }
}
